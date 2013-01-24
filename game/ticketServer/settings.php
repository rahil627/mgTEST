<?php

// Basic settings
// You must set these for the server to work

$databaseServer = "localhost";
$databaseUsername = "testUser";
$databasePassword = "testPassword";
$databaseName = "test";

// The URL of to the server.php script.
$fullServerURL = "http://localhost/jcr13/ticketServer/server.php";


// The URL of the main, public-face website
$mainSiteURL = "http://sleepisdeath.net";



// End Basic settings



// Customization settings

// Adjust these to change the way the server  works.


// Prefix to use in table names (in case more than one application is using
// the same database).  Three tables are created:  "log", "tickets", and
// "downloads".
//
// If $tableNamePrefix is "test_" then the tables will be named
// "test_log" and "test_tickets" and "test_downloads".
//
// Thus, more than one server installation can use the same database
// (or the server can share a database with another application that uses
//  similar table names).
$tableNamePrefix = "ticketServer_";


// number of "readable base-32" digits (2-9,A-H,J-N,P-Z) in each ticket ID
// Tickets are broken up into clumps of 5 digits separated by "-"
// max supported length is 210 (with separators inserted, this is a
// 251-character string)
// 5 bits of security per digit.
$ticketIDLength = 20;

// Replace this with a secret string.
// Used when generating random, unguessable ticket IDs
$ticketGenerationSecret = "b9336d21169bd0b46af2f655a7fda7b09cc2f7d7";



$enableLog = 1;


// should web-based admin require yubikey two-factor authentication?
$enableYubikey = 1;

// 12-character Yubikey IDs, one list for each access password
// each list is a set of ids separated by :
// (there can be more than one Yubikey ID associated with each password)
$yubikeyIDs = array( "ccccccbjlfbi:ccccccbjnhjc:ccccccbjnhjn", "ccccccbjlfbi" );

// used for verifying response that comes back from yubico
// Note that these are working values, but because they are in a public
// repository, they are not secret and should be replaced with your own
// values (go here:  https://upgrade.yubico.com/getapikey/ )
$yubicoClientID = "9943";
$yubicoSecretKey = "rcGgz0rca1gqqsa/GDMwXFAHjWw=";


// For hashing admin passwords so that they don't appear in the clear
// in this file.
// You can change this to your own string so that password hashes in
// this file differ from hashes of the same passwords used elsewhere.
$passwordHashingPepper = "262f43f043031282c645d0eb352df723a3ddc88f";

// passwords are given as hashes below, computed by:
// hmac_sha1( $passwordHashingPepper, $password )
// Where $passwordHashingPepper is used as the hmac key.

// For convenience, after setting a $passwordHashingPepper and chosing a
// password, hashes can be generated by invoking passwordHashUtility.php
// in your browser.

// default passwords that have been included as hashes below are:
// "secret" and "secret2"

// hashes of passwords for for web-based admin access
$accessPasswords = array( "0d322c185021e42cccba40fa34ba1dd2f92a2509",
                          "15ec5e229d96c9d21b40aba716bd66275fc89b9a" );


// secret used for encrypting a download code when it is requested for a
// given email address
// (for remote procedure calls that need to obtain a download code for a given
//  user)
// MUST replace this to keep ticket ids secret from outsiders
$sharedEncryptionSecret = "19fbc6168268d7a80945e35d999f0d0ddae4cdff";


// batch size for sending email to all opt-in users
// useful if your server has a "max emails per hour" limit
// (My server has a limit of 1000/hour)
$emailMaxBatchSize = 900;




// maps item purchase tags to dates in New York time
$allowedDownloadDates = array( "april_9" => "2010-04-09 00:00:00",
                               "april_12" => "2010-04-12 00:00:00" );

// secret shared with fastspring server, one per purchase tag from above
$fastspringPrivateKeys = array( "april_9" => "secret A",
                                "april_12" => "secret B" );


// files to serve, from path below
$fileList = array( "sueFamilyWeb.jpg", "SleepIsDeath_v2_UnixSource.tar.gz" );

$fileDescriptions = array(
    "Sue's family picture, from the archive.",
    "Unix (and Mac/Windows) Source Code (<A HREF=\"sourceCompileNotes.shtml\">notes</A>)" );



// should not be web-accessible
$downloadFilePath = "/home/jcr13/sidDownloads/";



// header and footers for various pages
$header = "include( \"header.php\" );";
$footer = "include( \"footer.php\" );";

$fileListHeader = $header .
'echo "<center><font size=6>Downloads</font><br><br>";' .
'echo "Your Download Code is: <b>$ticket_id</b><br><br><br></center>";';




// parameters for download emails that are sent out
$siteName = "Sleep Is Death";
$siteEmailAddress = "jcr13@cornell.edu";

// can be left blank to just give download information
// should contain newlines to separate it from next part of email
// if not blank
$extraEmailMessage =
"Please share the following information with a friend, so that you ".
"have someone to play the game with.\n\n";




// number of tickets shown per page in the browse view
$ticketsPerPage = 6;





?>