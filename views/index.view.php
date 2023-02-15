<div class="container" style="min-width: 375px;max-width: 1440px">   
    <?php
        $flag = false;
        if (!isset($_POST['search']) || isset($_POST['home'])){

            //if (in_array($search_term,))
            $i = 0;
            while ($i < count($model)) {
                [$company,$position,$role,$logo,$new,$featured,$level,$postedAt,$contract,$location,$languages,$tools] = read_entry($model,$i);
                $i++;
            
                   
                ?>
                
                <table class="table" style="font-family:'League Spartan';background-color:white;box-shadow: 2px 2px 10px #c1cbc9; border-radius: 10px;">
                <tr style="line-height:5px;">
                    <td style="width: 100px"><img src= <?= $logo ?> height="75" width="75"></td>
                    <td>
                    <table style="font-family:'League Spartan';table-layout:fixed;border-collapse: collapse; border: none;border-top: 2px solid white">
                    <tr  style="box-shadow: none;border=none;border-top: 2px solid white;">
                    <td style="color:hsl(180, 29%, 50%)"><?= $company ?></td>
                    <td style = "text-align: left"><?php if ($new == true) {echo "<mark style='border-radius: 25px;color:white;background-color:hsl(180, 29%, 50%);
                                                                                    padding:.5em;font-size:10px;font-weight:800;'>NEW!</mark>";} ?></td>

                    <td style = "text-align: left"><?php if ($featured == true) {echo "<mark style='border-radius: 25px;color:white;background-color:#2a3838;padding:.5em;
                                                                                    font-size:10px;font-weight:800;'>FEATURED</mark>";} ?></td>
                    </tr>
                    <tr style="box-shadow: none;bordercolor=white;border-top: 2px solid white;border-bottom: 2px solid white;">
                    <tr style="box-shadow: none;bordercolor=white;border-top: 2px solid white;border-bottom: 2px solid white;"><th colspan="3"><?= $position ?></th></tr>
                    <tr ><th colspan="3" style="font-weight:200;font-size:15px;color:#889894;"><?= "$postedAt  &#8226  $contract  &#8226  $location" ?></th></tr>
              
                    </tr>
                    </table>
                    </td>
                    <td style="text-align: right"> <?php echo "<mark>$role</mark>".str_repeat("&nbsp;",6); 
                        echo  "<mark>$level</mark>".str_repeat("&nbsp;",6); 
                        foreach($languages as $language) {echo"<mark>$language</mark>".str_repeat("&nbsp;",6);}  
                        foreach($tools as $tool) {echo "<mark>$tool</mark>".str_repeat("&nbsp;",6);}  ?> </td>
                </tr>
                </table>
                

        <?php } } else {
                $search_term = $_POST['q'];
                echo "<mark style='background-color:#2a3838;border-radius:10px;font-weight:bold;color:white;'>$search_term</mark><br></br>";
                //echo "Applied Filter:."$search_term;

                $i = 0;
                
                while ($i < count($model)) {
                    [$company,$position,$role,$logo,$new,$featured,$level,$postedAt,$contract,$location,$languages,$tools] = read_entry($model,$i);
                    $i++;

                     if (in_array(strtolower($search_term),to_lowercase($languages)) || in_array(strtolower($search_term),to_lowercase($tools)) || strtolower($search_term) == strtolower($role) || strtolower($search_term) ==  strtolower($level)){
                        //print_r($languages);
                        //print_r($tools);
                        $flag = true;
            ?>
                        <table class="table" style="font-family:'League Spartan';background-color:white;box-shadow: 2px 2px 10px #c1cbc9; border-radius: 10px;">
                    <tr style="line-height:5px;">
                        <td style="width: 100px"><img src= <?= $logo ?> height="75" width="75"></td>
                        <td>
                        <table style="font-family:'League Spartan';table-layout:fixed;border-collapse: collapse; border: none;border-top: 2px solid white">
                        <tr  style="box-shadow: none;border=none;border-top: 2px solid white;">
                        <td style="color:hsl(180, 29%, 50%)"><?= $company ?></td>
                        <td style = "text-align: left"><?php if ($new == true) {echo "<mark style='border-radius: 25px;color:white;background-color:hsl(180, 29%, 50%);
                                                                                        padding:.5em;font-size:10px;font-weight:800;'>NEW!</mark>";} ?></td>
                        <td style = "text-align: left"><?php if ($featured == true) {echo "<mark style='border-radius: 25px;color:white;background-color:#2a3838;padding:.5em;
                                                                                            font-size:10px;font-weight:800;'>FEATURED</mark>";} else {echo str_repeat("&nbsp;",8);}?></td>
                        </tr>
                        <tr style="box-shadow: none;bordercolor=white;border-top: 2px solid white;border-bottom: 2px solid white;">
                        <tr style="box-shadow: none;bordercolor=white;border-top: 2px solid white;border-bottom: 2px solid white;"><th colspan="3"><?= $position ?></th></tr>
                        <tr ><th colspan="3" style="font-weight:200;font-size:15px;color:#889894;"><?= "$postedAt  &#8226  $contract  &#8226  $location" ?></th></tr>
                
                        </tr>
                        </table>
                        </td>
                        <td style="text-align: right"> <?php echo "<mark>$role</mark>".str_repeat("&nbsp;",6); 
                            echo  "<mark>$level</mark>".str_repeat("&nbsp;",6); 
                            foreach($languages as $language) {echo"<mark>$language</mark>".str_repeat("&nbsp;",6);}  
                            foreach($tools as $tool) {echo "<mark>$tool</mark>".str_repeat("&nbsp;",6);}  ?> </td>
                    </tr>
                    </table>




        <?php } 
        } 
    }
        if ($flag == false && isset($_POST['search'])) {
        echo "<p style='font-size:20px;color:darkred;'>No results were found.</p>";
    }
            ?>
    

</div>
    
