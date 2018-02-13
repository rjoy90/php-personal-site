<?php
	require_once('../templates/header.php');
?>
	<script src="js/currentPage.js"></script>
    <font face="Arial" size="5" color="red"><b><?php print("Stages of Web Design:<br>"); ?></b></font>
        <?php
            print("1. Plan<br>");
            print("2. Analyze<br>");
            print("3. Design<br>");
            print("4. Test<br>");
            print("5. Refine<br><br>");
        ?>

    <font face="Arial" size="5" color="red"><b><?php print("And some elements of usability/content design:<br> "); ?></b></font>
        <?php
            print("Keep content short and sweet, and link to longer descriptions/details when necessary<br>");
            print("Never forget to link any CSS to all relevant pages which it will be used<br>");
            print("Make sure text is readable for any type of user<br>");
            print("Videos should be very short, otherwise include text or image and link to it<br>");
            print("Always use drop down menus for organization<br>");
            print("Include a search box and a comment form somewhere for user feedback<br>");
            print("Include date created, and version number when updating, plus revision date<br>");
            print("Include timezone and mention an example city/time for users<br>");
            print("do not add unnecessary graphics/icons/etc<br>");
            print("Include more relevant content at top of pages<br>");
            print("always try to meet the users requests/needs<br>");
            print("use a meaningful title and include you (the creator's) name and contact somewhere<br><br>");
        ?>

    <!--<font face="Arial" size="5" color="red"><b><?php// print("Last, a test run of the phpinfo:<br><br>");?></b></font>-->
        <?php
          //phpinfo();
		  require_once('../templates/footer.php');
        ?>  
