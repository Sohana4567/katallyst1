<?php  include 'inc/header.php';?>
<?php  include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2 style="center">Learning List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
                            <th width="10%">No</th>
						    <th width="10%">Partner Name</th>
							<th width="10%">Partner Description</th>
						
                            </tr>
					</thead>
                    <tbody>
					<?php
                      $query="SELECT * FROM `tbl_learning`";
                       $partner=$db->select($query);
                      if($partner){
                           $i=0;
                          while($result=$partner->fetch_assoc()){
                            $i++;
                      ?>
                       <tr class="odd gradeX">
							<td ><?php echo $i; ?></td>
                            <td><a href="learninglist.php?learningid=<?php echo $result['partner_id'];?>"><?php echo $result['partner_name']; ?></a></td>
                            <td><?php echo  $fm->textShorten($result['partner_description']);?></td>
                            </tr>
						   <?php } } ?>	
					</tbody>
				</table>
	
               </div>
            </div>
		</div>
		<script type="text/javascript">
			$(document).ready(function () {
				setupLeftMenu();
				$('.datatable').dataTable();
				setSidebarHeight();
			});
		</script>