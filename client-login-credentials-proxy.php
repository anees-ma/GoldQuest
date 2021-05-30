<!-- <div class="form-title page-title">Client Login Credentials </div> -->
    <div class="task_tabl" id="task_tabl_">
        <table class="dataTable-gn-proxy tbl_data tbl_data2">
          <thead>
            <tr>
            <th>SL</th>
            <th> Client Code</th>
            <th>Company Name</th>
            <th>Username</th>
            <th>Password</th>
            <th>Login Link</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php 
            $cllog=mysqli_query($con,"select * from client_login order by id  DESC");
            $o=1;
            while($cllogres=mysqli_fetch_assoc($cllog)){
                $crid=$cllogres['client_uid'];
                $crqry=mysqli_query($con,"select * from clent_details where client_uid='$crid'");
                $crqryres=mysqli_fetch_assoc($crqry);
            ?>
            <tr>
               <td><?php echo $o;?></td>
               <td><?php echo $cllogres['client_uid'];?></td>
               <td><?php echo $crqryres['company_name'];?></td>
               <td><?php echo $cllogres['email'];?></td>
               <td><?php echo $cllogres['pas_wrd'];?></td>
                <td><a style="color:blue;font-weight:bold" href="<?php echo APP_PATH;?>/customerlogin?m=<?php echo$cllogres['email'];?>&s=<?php echo $cllogres['pas_wrd'];?>" target="_blank">Go</a></td>
               <!--<td><a style="color:blue;font-weight:bold" href="http://localhost/GoldQuest/customerlogin?m=<?php echo$cllogres['email'];?>&s=<?php echo $cllogres['pas_wrd'];?>" target="_blank">Go</a></td>-->
               <td><button class="btn btn-danger btn-delete-client-login" data-clientid="<?php echo $cllogres['id']; ?>" data-clientuid="<?php echo $cllogres['client_uid']; ?>">Delete</button></td>

            </tr>
            <?php
            $o++;
            }
            ?>
          </tbody>
        </table>
    </div>
    <script>
       $('.dataTable-gn-proxy').DataTable({
        "dom": 'lfrtp',
        "bSort" : false,
      });
    </script>