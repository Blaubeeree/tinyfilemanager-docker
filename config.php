<?php
// Auth with login/password
// set true/false to enable/disable it
// Is independent from IP white- and blacklisting
$use_auth = (bool) getenv('TFM_USE_AUTH');

// Login user name and password
// Users: array('Username' => 'Password', 'Username2' => 'Password2', ...)
// Generate secure password hash - https://tinyfilemanager.github.io/docs/pwd.html
$auth_users = json_decode(getenv('TFM_AUTH_USERS'), true);

// Readonly users
// e.g. array('users', 'guest', ...)
$readonly_users = explode(',', getenv('TFM_READONLY_USERS'));

// Global readonly, including when auth is not being used
$global_readonly = (bool) getenv('TFM_GLOBAL_READONLY');

// user specific directories
// array('Username' => 'Directory path', 'Username2' => 'Directory path', ...)
$directories_users = json_decode(getenv('TFM_DIRECTORIES_USERS'), true);

// Enable highlight.js (https://highlightjs.org/) on view's page
$use_highlightjs = (bool) getenv('TFM_USE_HIGHLIGHTJS');

// highlight.js style
// for dark theme use 'ir-black'
$highlightjs_style = getenv('TFM_HIGHLIGHTJS_STYLE');

// Enable ace.js (https://ace.c9.io/) on view's page
$edit_files = (bool) getenv('TFM_EDIT_FILES');

// Default timezone for date() and time()
// Doc - http://php.net/manual/en/timezones.php
$default_timezone = getenv('TFM_DEFAULT_TIMEZONE');

// Root path for file manager
// use absolute path of directory i.e: '/var/www/folder' or $_SERVER['DOCUMENT_ROOT'].'/folder'
//make sure update $root_url in next section
$root_path = getenv('TFM_ROOT_PATH');

// Root url for links in file manager.Relative to $http_host. Variants: '', 'path/to/subfolder'
// Will not working if $root_path will be outside of server document root
$root_url = getenv('TFM_ROOT_URL');

// Server hostname. Can set manually if wrong
// $_SERVER['HTTP_HOST'].'/folder'
$http_host = getenv('TFM_HTTP_HOST') ?: $_SERVER['HTTP_HOST'];

// input encoding for iconv
$iconv_input_encoding = getenv('TFM_ICONV_INPUT_ENCODING');

// date() format for file modification date
// Doc - https://www.php.net/manual/en/function.date.php
$datetime_format = getenv('TFM_DATETIME_FORMAT');

// Path display mode when viewing file information
// 'full' => show full path
// 'relative' => show path relative to root_path
// 'host' => show path on the host
$path_display_mode = getenv('TFM_PATH_DISPLAY_MODE');

// Allowed file extensions for create and rename files
// e.g. 'txt,html,css,js'
$allowed_file_extensions = getenv('TFM_ALLOWED_FILE_EXTENSIONS');

// Allowed file extensions for upload files
// e.g. 'gif,png,jpg,html,txt'
$allowed_upload_extensions = getenv('TFM_ALLOWED_UPLOAD_EXTENSIONS');

// Favicon path. This can be either a full url to an .PNG image, or a path based on the document root.
// full path, e.g http://example.com/favicon.png
// local path, e.g images/icons/favicon.png
$favicon_path = getenv('TFM_FAVICON_PATH');

// Files and folders to excluded from listing
// e.g. array('myfile.html', 'personal-folder', '*.php', '/path/to/folder', ...)
$exclude_items = explode(',', getenv('TFM_EXCLUDE_ITEMS'));

// Online office Docs Viewer
// Available rules are 'google', 'microsoft' or false
// Google => View documents using Google Docs Viewer
// Microsoft => View documents using Microsoft Web Apps Viewer
// false => disable online doc viewer
$online_viewer = getenv('TFM_ONLINE_VIEWER');

// Sticky Nav bar
// true => enable sticky header
// false => disable sticky header
$sticky_navbar = (bool) getenv('TFM_STICKY_NAVBAR');

// Maximum file upload size
// Increase the following values in php.ini to work properly
// memory_limit, upload_max_filesize, post_max_size
$max_upload_size_bytes = (int) getenv('TFM_MAX_UPLOAD_SIZE_BYTES');

// chunk size used for upload
// eg. decrease to 1MB if nginx reports problem 413 entity too large
$upload_chunk_size_bytes = (int) getenv('TFM_UPLOAD_CHUNK_SIZE_BYTES');

// Possible rules are 'OFF', 'AND' or 'OR'
// OFF => Don't check connection IP, defaults to OFF
// AND => Connection must be on the whitelist, and not on the blacklist
// OR => Connection must be on the whitelist, or not on the blacklist
$ip_ruleset = getenv('TFM_IP_RULESET');

// Should users be notified of their block?
$ip_silent = (bool) getenv('TFM_IP_SILENT');

// IP-addresses, both ipv4 and ipv6
$ip_whitelist = explode(',', getenv('TFM_IP_WHITELIST'));

// IP-addresses, both ipv4 and ipv6
$ip_blacklist = explode(',', getenv('TFM_IP_BLACKLIST'));
