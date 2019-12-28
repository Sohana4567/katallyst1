<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Learning partner</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $partner_name=mysqli_real_escape_string($db->link,$_POST['partner_name']);
                    $partner_description=mysqli_real_escape_string($db->link,$_POST['partner_description']);
                    
                    if($partner_name==""|| $partner_description==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                    }
                    $query="INSERT INTO `tbl_learning`(`partner_name`,`partner_description`) VALUES ('$partner_name','$partner_description')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>partner  Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>partner not inserted!</span>";
                        }
                    }
                
            
?>
 <div class="block">               
                 <form action="addlearningpartner.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Partner Name</label>
                            </td>
                            <td>
                                <input type="text" name="partner_name" placeholder="Enter Partner..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Partner description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="partner_description"></textarea>
                            </td>
                        </tr>
            
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Add" />
                            </td>
                        </tr>

                    </table>
                    </form>
                </div>
            </div>
        </div>
        <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
        <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>