<?php if($page == 'active_clients'){ ?>
<div class="form-title page-title">GoldQuest Active Clients(Active)</div>

    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="ac-check-all">
      <span id="ac-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-active-client-btn" onclick="deleteActiveClient()" class="btn btn-danger">Delete</button>
    <div class="task_tabl">
                <table class="dataTable-gn tbl_data tbl_data2">
                  <thead>
                    <tr>
                      <th>SL</th>
                      <th>Detailed View</th>
                      <th>Company name</th>
                      <th>Address</th>
                      <th>Mobile</th>
                      <th>Agreement Period</th>
                      <th>Role</th>
                      <th>GST</th>
                      <th style="width: 213px !important;">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $sta_at='Active';
                    $clensel=mysqli_query($con,"select * from clent_details where status='$sta_at' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $clientname=$clenselres['company_name'];
                        $clientid=$clenselres['client_id'];
                        $client_uid_ac = $clenselres['client_uid'];
                        $cid = $clenselres['id'];
                    ?>
                    <tr id="blkr<?php echo $clientid;?>" class="grey-bg">
                        <td><input type="checkbox" value="<?php echo $cid; ?>" class="check-delete-active" data-clientuid="<?php echo $client_uid_ac;?>"><span><?php echo $l;?></span></td>
                        <td class="detview" onclick="detv(this)" data-clid="<?php echo $clientid;?>">View</td>
                        <td><?php echo ucfirst($clenselres['company_name']);?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['dsagreepero'];?></td>
                        <td><?php echo ucfirst($clenselres['role']);?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="update" onclick="upd(this)" data-updid="<?php echo $clientid ;?>" class="btn btn-xs btn-primary float-left" style="
                          padding: 3px">Edit</button>
                        <button id="delete" style="
                          padding: 3px" onclick="blck(this)" data-blcid="<?php echo $clientid;?>" class="btn btn-xs btn-danger fblo<?php echo $clientid;?> float-left ml-1">Block</button></td>
                    </tr>
                    <?php
                    $l++;
                    }
                    ?>
                  </tbody>
                </table>
            </div>
            <?php }elseif($page == 'inactive_clients'){ ?>

                <div class="form-title">Client Management System (Inactive)</div>

    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="inac-check-all">
      <span id="inac-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-inactive-client-btn" onclick="deleteInactiveClient()" class="btn btn-danger">Delete</button>

    <div class="task_tabl">
                <table class="tbl_data">
                    <th>SL</th>
                    <th>Detailed View</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>Mobile</th>
                    <th>Agreement Period</th>
                    <th>Role</th>
                    <th>GST</th>
                    <th>Actions</th>
                    <?php 
                    $sta_at='In Active';
                    $clensel=mysqli_query($con,"select * from clent_details where status='$sta_at' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $clientname=$clenselres['company_name'];
                        $clientid=$clenselres['client_id'];
                        $cid = $clenselres['id'];
                    ?>
                    <tr id="blkr<?php echo $clientid;?>">
                        <td><input type="checkbox" value="<?php echo $cid; ?>" class="check-delete-inactive"><span><?php echo $l;?></span></td>
                        <td class="detview" onclick="detvinc(this)" data-clid="<?php echo $clientid;?>">View</td>
                        <td><?php echo ucfirst($clenselres['company_name']);?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['dsagreepero'];?></td>
                        <td><?php echo ucfirst($clenselres['role']);?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="delete" onclick="unblck(this)" data-blcid="<?php echo $clientid;?>" class="btn btn-success fblo<?php echo $clientid;?>">Unblock</button></td>
                    </tr>
                    <?php
                    $l++;
                    }
                    ?>
                </table>
            </div>


         <?php  } ?>

         <script>
            $('.dataTable-gn').DataTable({
        "dom": 'lfrtp',
        "bSort" : false,
      });
         </script>