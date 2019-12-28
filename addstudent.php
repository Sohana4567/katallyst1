<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Teacher</h2>
                <?php
                if($_SERVER['REQUEST_METHOD']=='POST') {
                    
                    $student_name=mysqli_real_escape_string($db->link,$_POST['student_name']);
                    $student_description=mysqli_real_escape_string($db->link,$_POST['student_description']);
                    
                    if($student_name==""|| $student_description==""){
                        echo "<span class='error'>Field must not be empty !</span>";
                    }
                    $query="INSERT INTO `tbl_student`(`student_name`,`student_description`) VALUES ('$student_name','$student_description')";
                        $inserted_rows=$db->insert($query);
                        if($inserted_rows){
                            echo "<span class='success'>Student  Inserted Successfully</span>";
                        }else{
                            echo "<span class='error'>Student not inserted!</span>";
                        }
                    }
                
            
?>
 <div class="block">               
                 <form action="addstudent.php" method="post">
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Student Name</label>
                            </td>
                            <td>
                                <input type="text" name="student_name" placeholder="Enter Students..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Student description</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="student_description"></textarea>
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