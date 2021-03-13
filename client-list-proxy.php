<?php if($page == 'active_clients'){ ?>
<div class="form-title">GoldQuest Active Clients(Active)</div>

    <div style="float:left;margin-left: 15px;
    padding-bottom: 10px;">
      <input type="checkbox" id="ac-check-all">
      <span id="ac-check-all-t">Check All</span>
    </div>
    <button style="float: left;margin-left: 53px; display: none;margin-top: -10px;" id="delete-active-client-btn" onclick="deleteActiveClient()" class="btn btn-danger">Delete</button>
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
                    $sta_at='Active';
                    $clensel=mysqli_query($con,"select * from clent_details where status='$sta_at' order by id  DESC");
                    $l=1;
                    while($clenselres=mysqli_fetch_assoc($clensel)){
                        $clientname=$clenselres['company_name'];
                        $clientid=$clenselres['client_id'];
                        $cid = $clenselres['id'];
                    ?>
                    <tr id="blkr<?php echo $clientid;?>">
                        <td><input type="checkbox" value="<?php echo $cid; ?>" class="check-delete-active"><span><?php echo $l;?></span></td>
                        <td class="detview" onclick="detv(this)" data-clid="<?php echo $clientid;?>">View</td>
                        <td><?php echo ucfirst($clenselres['company_name']);?></td>
                        <td><?php echo $clenselres['address'];?></td>
                        <td><?php echo $clenselres['mobile'];?></td>
                        <td><?php echo $clenselres['dsagreepero'];?></td>
                        <td><?php echo ucfirst($clenselres['role']);?></td>
                        <td><?php echo $clenselres['gst'];?></td>
                        <td><button id="update" onclick="upd(this)" data-updid="<?php echo $clientid ;?>" class="btn btn-warning">Edit</button>
                        <button id="delete" onclick="blck(this)" data-blcid="<?php echo $clientid;?>" class="btn btn-danger fblo<?php echo $clientid;?>">Block</button></td>
                    </tr>
                    <?php
                    $l++;
                    }
                    ?>
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