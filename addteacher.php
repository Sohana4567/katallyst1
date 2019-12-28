<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Teacher</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $teacher_name=mysqli_real_escape_string($db->link,$_POST['teacher_name']);
                    $teacher_description=mysqli_real_escape_string($db->link,$_POST['teacher_description']);
                    
                    if($teacher_name==""|| $teacher_description==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                    }
                    $query="INSERT INTO `tbl_teacher`(`teacher_name`,`teacher_description`) VALUES ('$teacher_name','$teacher_description')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>Teacher  Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>Teacher not inserted!</span>";
                        }
                    }
                
            
?>
 <div class="block">               
                 <form action="addteacher.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Teacher Name</label>
                            </td>
                            <td>
                                <input type="text" name="teacher_name" placeholder="Enter Teacher..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Teacher description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="teacher_description"></textarea>
                            </td>
                        </tr>
            
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" />
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