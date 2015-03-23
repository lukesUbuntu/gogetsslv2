
/*
 * @name : Tab_client_install.js
 * @description : Handles all our tabs requires Jquery
 */
var gogetssl_other_methods = {};

    var loaded = {
        approval_emails : true
    }

	$(document).ready(function(){
        //if our $post_back is set lets put the data back into elements
        if (typeof $post_back == "object")
        $.each($post_back,function(key,value){
            //check element matches our key
            if ($("#"+key).length > 0){
                $("#"+key).val(value);
            }
        });

        //check if we have html5 support for download attribute http://caniuse.com/#feat=download
        var download_support = true;
        if (typeof document.getElementById('http_methods_download').download == "undefined") {
            //we will just use serverside to generate download file for http auth
            console.log("browser doesn't support html5 download attribute using server");
            download_support = false;
        }

        //check we have our action_url & ajax_query available otherwise this script is useless
        if (typeof $action_url !='string' || typeof $ajax_query != 'object'){
            alert("can not make ajax query");
            return;
        }

        //***********************ELEMENT BINDINGS BELOW HERE**************************************
	        //@todo add a callback for each step to have completed

            var last_step = 1;
            $(".steps").click(function(){
                //get the step we clicked
                var step = $(this).attr("step")
                var step_no = $(this).attr("step").match(/\d+/);

                $(".steps").removeClass("btn-success").addClass("btn-disabled");

                $(this).removeClass("btn-disabled").addClass("btn-success");

                $(".step_tab").hide();

                $('#' + step).show();

                //if we havent finished loading ajax will show loading dialog
                if (step == "step_3" && loaded.approval_emails == false){
                    $("#installCsrForm").append($(this).blestaLoadingDialog());
                }


            });

        //Get other approval options
        $("#getAlternatives").click(getOtherApprovals);

        //Download file for HTTP aprovals
        $("#http_methods_download").click(function(e){
            if (!download_support){
                //this is for non html5 download attribute users http://caniuse.com/#feat=download
                window.open($action_url +"?action=http_download&contents="+encodeURIComponent(gogetssl_other_methods.http.content) + "&file_name="+encodeURIComponent(gogetssl_other_methods.http.filename)
                    , gogetssl_other_methods.http.filename + " Download",
                    'window settings'

                );
                e.preventDefault ();
                return false;
            }
        });

        //on approver change show the correct div
        $( "#gogetssl_approver_type" ).change(function() {

            $(".install_methods").hide();

            var method_type = $(this).val();

            if (method_type == "http")
                processHTTP_method();

            if (method_type == "dns")
                processDNS_method();

            if (method_type == "email")
                $("#get_approver_email").show();
        });

        //***********************FINAL PAGE MODIFICATIONS**************************************
        $(".install_methods").hide();
        $("#other_methods_div").hide();

        //getOtherApprovals();
        //only show get email approval if we haven't parsed any from install methods
        getEmailApproval();
	});

    /*
     * Process DNS Method, generates view + installition details
     */
    function processDNS_method(){
        //pre-check we haven't processed already
        if ($("#dns_method").hasClass('loaded')){
            $("#dns_method").show()
            return;
        }
        //console.log("gogetssl_other_methods.http.content",gogetssl_other_methods.dns);

        if (typeof gogetssl_other_methods.dns.record != "string" && !/CNAME/.test(gogetssl_other_methods.dns.record)){
            alert("error processing DNS authorisation");
            return;
        }
        //passed our checks lets split into 2 records
        var dns_records = gogetssl_other_methods.dns.record.split("CNAME");

        var our_dns_record = dns_records[0].split(".")[0] , comodo_dns = dns_records[1];
        $(".dns_method_cname").text(our_dns_record);
        $(".dns_method_cname_point").text(comodo_dns);

        //Just so we don't reload this function again
        $("#dns_method").show().addClass('loaded');
    }

    /*
     * Process HTTP Method, generates view + installition details
     */
    function processHTTP_method(){

        //pre-check we haven't processed already
        if ($("#http_method").hasClass('loaded')){
            $("#http_method").show()
            return;
        }

        $("#http_method_content").text(gogetssl_other_methods.http.content);
        $("#http_method_filename").text(gogetssl_other_methods.http.filename);

        //create the link
        $link = $("<a>").attr(
            {
                'href' : gogetssl_other_methods.http.link,
                'target' : '_blank'
            }
        ).text(gogetssl_other_methods.http.link);

        //apend download file to link
        //<a href="data:text/plain;charset=UTF-8,Hello%20World!" download="filename.txt">Download</a>
        //Append our download option of file
        $("#http_methods_download").attr(
            {
                'download' : gogetssl_other_methods.http.filename,
                'href'     : 'data:text/plain;charset=UTF-8,'+encodeURIComponent(gogetssl_other_methods.http.content)
            }
        );
        $("#http_method_link").append($link);

        //Just so we don't reload this function again
        $("#http_method").show().addClass('loaded');
    }

    /*
     * Gets the Email Approver emails for domain
     */
    function getEmailApproval(){

        $("#get_approver_email").show();

        //basic append so that user knows whats happening
        $("#gogetssl_approver_email").append( new Option("Waiting for emails to load.."));

        //set our ajax action
        $ajax_query.action = 'emailAuthorisation';

        $.ajax({
            method: 'GET',
            url: $action_url,
            data: $ajax_query,
            dataType: "jsonp",
            cache : true,
            success: function (response) {
                //console.log("response",response);
                if (response.success == true){
                    //empty our aproveral list
                    $("#gogetssl_approver_email").empty();
                    //loop the data and append as option
                    $.each(response.data,function(auth_id,auth_email){
                        $("#gogetssl_approver_email").append( new Option(auth_email,auth_id) )
                    });
                }else{
                    console.log("getEmailApproval : response error",response);
                    alert("Failed to retrieve email approvers")
                }

            },
            beforeSend: function() {
                $("#installCsrForm").append($(this).blestaLoadingDialog());
            },
            complete: function() {
                $(".loading_container", $("#installCsrForm")).remove();
            }
        });
    }

    /*
     * Gets all other Approval methods, which are DNS,HTTP
     */
    function getOtherApprovals(){
        //can not get other approvals without a CSR
        if (!/BEGIN CERTIFICATE REQUEST/.test($("#gogetssl_csr").val())){
            alert("You need to enter a CSR before we can get other authorization methods");
            return;
        }

        //Setup our ajax call
        $ajax_query.action = 'authAlternatives';
        $ajax_query.csr_data =    $("#gogetssl_csr").val();


        $.ajax({
            method: 'GET',
            url: $action_url,
            data: $ajax_query,
            dataType: "jsonp",
            cache : true,
            success: function (response) {

                if (response.success == true && typeof response.data.validation == "object"){

                    //add to our methods
                    gogetssl_other_methods.http = response.data.validation.http.http;
                    gogetssl_other_methods.dns = response.data.validation.dns.dns;
                    //Show the other methods
                    $("#other_methods_div").show();
                    //since http will be first option we will generate this view
                    processHTTP_method();
                    //we will hide our aproval email options as this will be meged with alternatives now
                    $("#get_approver_email").hide();
                    $("#getAlternatives").remove();
                }else{
                    console.log("getOtherApprovals : ajax error",typeof response)
                    alert("Failed Reason : "+ response.data);
                }

            },
            beforeSend: function() {
                $("#installCsrForm").append($(this).blestaLoadingDialog());
            },
            complete: function() {
                $(".loading_container", $("#installCsrForm")).remove();
            }
        });
    }
             