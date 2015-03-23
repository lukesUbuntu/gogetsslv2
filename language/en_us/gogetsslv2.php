<?php
// Errors
$lang['GoGetSSLv2.!error.api_username.empty'] = "Please enter an API username.";
$lang['GoGetSSLv2.!error.api_username.valid'] = "A connection to the server could not be established. Please check to ensure that the API credentials are correct.";
$lang['GoGetSSLv2.!error.api_password.empty'] = "Please enter an API password.";

$lang['GoGetSSLv2.!error.gogetssl_name.empty'] = "Please enter a reseller name.";
$lang['GoGetSSLv2.!error.gogetssl_validity.empty'] = "Please enter a validity period.";

$lang['GoGetSSLv2.!error.gogetssl_approver_email.format'] = "Please enter a valid approver E-Mail.";
$lang['GoGetSSLv2.!error.gogetssl_csr.format'] = "Please enter a value CSR.";
$lang['GoGetSSLv2.!error.gogetssl_fqdn.format'] = "Please enter a valid Domain.";
$lang['GoGetSSLv2.!error.gogetssl_webserver_type.format'] = "Please enter a valid Webserver Type.";

$lang['GoGetSSLv2.!error.meta[product].valid'] = "Please select a product.";
$lang['GoGetSSLv2.!error.meta[gogetssl_name].empty'] = "Please select at least one reseller.";

$lang['GoGetSSLv2.!error.api.internal'] = "An internal error occurred, or the server did not respond to the request.";


// Common
$lang['GoGetSSLv2.please_select'] = "-- Please Select --";

// Basics
$lang['GoGetSSLv2.name'] = "GoGetSSLv2 Extra";
$lang['GoGetSSLv2.module_row'] = "GoGetSSLv2 Reseller";
$lang['GoGetSSLv2.module_row_plural'] = "Resellers";


// Module management
$lang['GoGetSSLv2.add_module_row'] = "Add Reseller";
$lang['GoGetSSLv2.manage.module_rows_title'] = "GoGetSSLv2 Resellers";
$lang['GoGetSSLv2.manage.module_rows.edit'] = "Edit";
$lang['GoGetSSLv2.manage.module_rows.delete'] = "Delete";
$lang['GoGetSSLv2.manage.module_rows.confirm_delete'] = "Are you sure you want to delete this reseller?";
$lang['GoGetSSLv2.manage.module_rows_no_results'] = "There are no resellers.";
$lang['GoGetSSLv2.manage.module_rows_heading.gogetssl_name'] = "Reseller name";
$lang['GoGetSSLv2.manage.module_rows_heading.options'] = "Options";


// Module row meta data
$lang['GoGetSSLv2.row_meta.gogetssl_name'] = "Reseller name";
$lang['GoGetSSLv2.row_meta.api_username'] = "API username";
$lang['GoGetSSLv2.row_meta.api_password'] = "API password";
$lang['GoGetSSLv2.row_meta.sandbox'] = "Sandbox";

// Add module row
$lang['GoGetSSLv2.add_row.box_title'] = "Add GoGetSSLv2 Reseller";
$lang['GoGetSSLv2.add_row.basic_title'] = "Basic Settings";
$lang['GoGetSSLv2.add_row.add_btn'] = "Add Reseller";


// Edit module row
$lang['GoGetSSLv2.edit_row.box_title'] = "Edit GoGetSSLv2 Reseller";
$lang['GoGetSSLv2.edit_row.basic_title'] = "Basic Settings";
$lang['GoGetSSLv2.edit_row.add_btn'] = "Update Reseller";


// Package fields
$lang['GoGetSSLv2.package_fields.product'] = "Product";

// Service fields
$lang['GoGetSSLv2.service_field.gogetssl_fqdn'] = "Host / Domain";
$lang['GoGetSSLv2.service_field.gogetssl_csr'] = "CSR content (paste your csr here)";
$lang['GoGetSSLv2.service_field.gogetssl_webserver_type'] = "Webserver type";
$lang['GoGetSSLv2.service_field.gogetssl_approver_email'] = "Approver E-Mail";

$lang['GoGetSSLv2.service_field.gogetssl_title'] = "Title";
$lang['GoGetSSLv2.service_field.gogetssl_firstname'] = "First name";
$lang['GoGetSSLv2.service_field.gogetssl_lastname'] = "Last name";
$lang['GoGetSSLv2.service_field.gogetssl_address1'] = "Address line 1";
$lang['GoGetSSLv2.service_field.gogetssl_address2'] = "Address line 2";
$lang['GoGetSSLv2.service_field.gogetssl_city'] = "City";
$lang['GoGetSSLv2.service_field.gogetssl_zip'] = "ZIP";
$lang['GoGetSSLv2.service_field.gogetssl_state'] = "State";
$lang['GoGetSSLv2.service_field.gogetssl_country'] = "Country";
$lang['GoGetSSLv2.service_field.gogetssl_email'] = "E-Mail";
$lang['GoGetSSLv2.service_field.gogetssl_number'] = "Telephone number (international format)";
$lang['GoGetSSLv2.service_field.gogetssl_organization'] = "Organization (enter NA if not applicable)";
$lang['GoGetSSLv2.service_field.gogetssl_organization_unit'] = "Organization unit (enter NA if not applicable)";
$lang['GoGetSSLv2.service_field.gogetssl_fax'] = "Fax number (international format)";

// Tabs
$lang['GoGetSSLv2.tab_reissue'] = "Reissue Certificate";
$lang['GoGetSSLv2.tab_install'] = "Install Certificate";
$lang['GoGetSSLv2.tab_csr_generator'] = "Generate CSR";

// Actions Tab
$lang['GoGetSSLv2.tab_reissue.heading_reissue'] = "Reissue Certificate";
$lang['GoGetSSLv2.tab_reissue.heading_install'] = "Install Certificate";

// Tab Client Install
$lang['GoGetSSLv2.tab_install.other_installs']                = "Other Authorisation Methods";
//$lang['GoGetSSLv2.tab_install.other_installs.http_select']    = "Upload file web server";
$lang['GoGetSSLv2.tab_install.other_installs.http_select']    = "HTTP/HTTPS Authorisation Method";

$lang['GoGetSSLv2.tab_install.other_installs.dns_select']     = "CNAME DNS Authorisation Method";
$lang['GoGetSSLv2.tab_install.other_installs.email_select']     = "Email Authorisation Method";

//CSR Generator Form
$lang['GoGetSSLv2.csr_form.fqdn']       = "Common Name";
$lang['GoGetSSLv2.csr_form.fqdn.description']       = "The FQDN for your domain eg: example.com";
$lang['GoGetSSLv2.csr_form.country']    = "Select Country";
$lang['GoGetSSLv2.csr_form.country.description']    = "";

$lang['GoGetSSLv2.csr_form.state']     = "State";
$lang['GoGetSSLv2.csr_form.state.description']     = "Full state name eg : Auckland";
$lang['GoGetSSLv2.csr_form.locality']    = "Locality";
$lang['GoGetSSLv2.csr_form.locality.description']    = "Full city name";

$lang['GoGetSSLv2.csr_form.organization']     = "Organization";
$lang['GoGetSSLv2.csr_form.organization.description']     = "Full legal company or personal name";
$lang['GoGetSSLv2.csr_form.organization_unit']    = "Organizational Unit";
$lang['GoGetSSLv2.csr_form.organization_unit.description']    = "Branch of organization";
$lang['GoGetSSLv2.csr_form.generate_csr_button']     = "Generate CSR";

$lang['GoGetSSLv2.csr_form.email']     = "Email Address";
$lang['GoGetSSLv2.csr_form.email.description']    = "eg : example@example.com";


?>