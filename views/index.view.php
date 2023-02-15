<div class="container" style="min-width: 375px;max-width: 1440px">   
    <?php
    // Variable flag to determine if the search matches aqui keyword. Otherwise "no results were found" is printed.
    $flag = false;

    // If no search has been performed or the home button has been pressed, the entire list is presented
    if (!isset($_POST['search']) || isset($_POST['home'])){

        // Loop to iterate over the json data
        $i = 0;
        while ($i < count($model)) {
            [$company,$position,$role,$logo,$new,$featured,$level,$postedAt,$contract,$location,$languages,$tools] = read_entry($model,$i);
            $i++;
        
                
            ?>
            
            <table class="table" style="background-color:white;box-shadow: 2px 2px 10px #c1cbc9; border-radius: 10px;">

            <!-- Single row table -->
            <tr style="line-height:5px;">

                <!-- First column: company logo -->
                <td style="width: 100px"><img src= <?= $logo ?> height="75" width="75"></td>

                <!-- Second column has a nested table-->
                <td>
                    <table style="border-collapse: collapse; border: none;border-top: 2px solid white">
                        <!-- First row: company; new and feature tags -->
                        <tr style="border-bottom: 2px solid white;">
                            <td style="color:hsl(180, 29%, 50%)"><?= $company ?></td>
                            <td style = "text-align: left"><?php if ($new == true) {echo "<mark style='border-radius: 25px;color:white;background-color:hsl(180, 29%, 50%);
                                                                                                                    padding:.5em;font-size:10px;font-weight:800;'>NEW!</mark>";} ?></td>

                            <td style = "text-align: left"><?php if ($featured == true) {echo "<mark style='border-radius: 25px;color:white;background-color:#2a3838;padding:.5em;
                                                                                                                    font-size:10px;font-weight:800;'>FEATURED</mark>";} ?></td>
                        </tr>

                        <!-- Second row: position -->
                        <tr><th colspan="3"><?= $position ?></th></tr>

                        <!-- Third row: time of posting, type of contract and location-->
                        <tr style="border-top: 2px solid white;"><th colspan="3" style="font-weight:200;font-size:15px;color:#889894;"><?= "$postedAt  &#8226  $contract  &#8226  $location" ?></th></tr>
                
                        
                    </table>
                </td>

                <!-- Third column has the role, languages and tools tags-->
                <td style="text-align: right"> <?php echo "<mark>$role</mark>".str_repeat("&nbsp;",6); 
                    echo  "<mark>$level</mark>".str_repeat("&nbsp;",6); 
                    foreach($languages as $language) {echo"<mark>$language</mark>".str_repeat("&nbsp;",6);}  
                    foreach($tools as $tool) {echo "<mark>$tool</mark>".str_repeat("&nbsp;",6);}  ?> </td>
            </tr>
            </table>
                

        <?php } 
        
    } else {
        // If a search has been performed, assign input to new variable
        $search_term = $_POST['q'];

        // Print tag of searched expression
        echo "<mark style='background-color:#2a3838;border-radius:10px;font-weight:bold;color:white;'>$search_term</mark><br></br>";

        // Loop to iterate over the json data
        $i = 0;
        while ($i < count($model)) {
            [$company,$position,$role,$logo,$new,$featured,$level,$postedAt,$contract,$location,$languages,$tools] = read_entry($model,$i);
            $i++;

                // Check if the search word matches any language, tool, role or level
                if (in_array(strtolower($search_term),to_lowercase($languages)) || 
                    in_array(strtolower($search_term),to_lowercase($tools)) || 
                    strtolower($search_term) == strtolower($role) || 
                    strtolower($search_term) ==  strtolower($level)){
                
                        $flag = true;
                        ?>

                        <table class="table" style="background-color:white;box-shadow: 2px 2px 10px #c1cbc9; border-radius: 10px;">

                            <!-- Single row table -->
                            <tr style="line-height:5px;">

                                <!-- First column: company logo -->
                                <td style="width: 100px"><img src= <?= $logo ?> height="75" width="75"></td>

                                <!-- Second column has a nested table-->
                                <td>
                                    <table style="border-collapse: collapse; border: none;border-top: 2px solid white">
                                        <!-- First row: company; new and feature tags -->
                                        <tr style="border-bottom: 2px solid white;">
                                            <td style="color:hsl(180, 29%, 50%)"><?= $company ?></td>
                                            <td style = "text-align: left"><?php if ($new == true) {echo "<mark style='border-radius: 25px;color:white;background-color:hsl(180, 29%, 50%);
                                                                                                                                    padding:.5em;font-size:10px;font-weight:800;'>NEW!</mark>";} ?></td>

                                            <td style = "text-align: left"><?php if ($featured == true) {echo "<mark style='border-radius: 25px;color:white;background-color:#2a3838;padding:.5em;
                                                                                                                                    font-size:10px;font-weight:800;'>FEATURED</mark>";} ?></td>
                                        </tr>

                                        <!-- Second row: position -->
                                        <tr><th colspan="3"><?= $position ?></th></tr>

                                        <!-- Third row: time of posting, type of contract and location-->
                                        <tr style="border-top: 2px solid white;"><th colspan="3" style="font-weight:200;font-size:15px;color:#889894;"><?= "$postedAt  &#8226  $contract  &#8226  $location" ?></th></tr>
                                
                                        
                                    </table>
                                </td>

                                <!-- Third column has the role, languages and tools tags-->
                                <td style="text-align: right"> <?php echo "<mark>$role</mark>".str_repeat("&nbsp;",6); 
                                    echo  "<mark>$level</mark>".str_repeat("&nbsp;",6); 
                                    foreach($languages as $language) {echo"<mark>$language</mark>".str_repeat("&nbsp;",6);}  
                                    foreach($tools as $tool) {echo "<mark>$tool</mark>".str_repeat("&nbsp;",6);}  ?> </td>
                            </tr>
                        </table>

                <?php } 
        } 
    }

    // If a search has been performed and no match was found, print "No results were found."
    if ($flag == false && isset($_POST['search'])) {
    echo "<p style='font-size:20px;color:darkred;'>No results were found.</p>";
    } ?>
    
</div>
    
