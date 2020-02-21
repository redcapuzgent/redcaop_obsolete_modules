<head>
    <title>Obsolete module cleanup howto guide</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js" integrity="sha256-wS9gmOZBqsqWxgIVgA8Y9WcQOa7PgSIX+rPA0VL2rbQ=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<?php

Authentication::authenticate();
$HtmlPage = new HtmlPage();
$HtmlPage->PrintHeaderExt();

global $conn;
global $module;

?>
<div class="container">
<h1 class="h1">Overview of obsolete module version directories</h1>
<p>

<BR/>

<div class="panel panel-info">
    <div class="panel-heading">
        The following directories can safely be removed
    </div>
    <div class="panel-body">
        <ul>
            <?php
            $obsoleteDirectories = $module->getObsoleteDirectories();
            foreach ($obsoleteDirectories as $obsoleteDirectory)
            {
                echo "<li>".$obsoleteDirectory. "</li>";
            }
            ?>
        </ul>
    </div>
</div>

<div class="panel panel-info">
    <div class="panel-heading">
        The following command can be used to remove the module directories
    </div>
    <div class="panel-body">
        <ul>
            <code>rm -r
                <?php

                global $module;
                /**
                 * @var $module \uzgent\ObsoleteModuleVersions\ObsoleteModuleVersions
                 */

                foreach ($module->getObsoleteAbsoluteDirectories() as $obsoleteDirectory)
                {

                    echo $obsoleteDirectory. " ";
                }

                ?>
            </code>

        </ul>
    </div>
</div>

<BR/>
