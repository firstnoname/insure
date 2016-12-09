<?php
require_once 'init_inc.php';
$db = new DB;
?>
<div class="widget-box " style="height: 240px">
    <div class="widget-header">
        <h4 class="smaller">
            ค้นหาข้อมูล
        </h4>
    </div>

    <div class="widget-body">
        <div class="widget-main">
            <form class="form-horizontal">
                <!-- <div class="table-responsive">  </div>-->
                <table class="col-sm-12">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label for="InputTitle" class="col-sm-7 control-label">คำนำหน้า</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputTitle" name="InputTitle">
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label for="InputName" class="col-sm-7 control-label">ชื่อ</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputName" name="InputName">
                                </div>
                            </div> 
                        </td>
                        <td>     
                            <div class="form-group">
                                <label for="InputLastName" class="col-sm-7 control-label">ชื่อสกุล</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputLastName" name="InputLastName">
                                </div>
                            </div>
                        <td>   
           <div class="form-group">
          <label for="InputName" class="col-sm-7 control-label">โทรศัพท์</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="InputName" >
          </div>
        </div>
        </td>
            <td>   
           <div class="form-group">
          <label for="InputName" class="col-sm-7 control-label">วันที่หมดกรมธรรม์</label>
          <div class="col-sm-5">
          <input type="text" class="form-control" id="InputName" >
          </div>
        </div>
        </td>
                    </tr>
                    <tr>
                        <td>
             <div class="form-group">
          <label for="InputName" class="col-sm-7 control-label">ทะเบียนรถ</label>
           <div class="col-sm-5">
          <input type="text" class="form-control" id="InputName" >
</div>
        </div> 
        </td>
                        <td>  
                            <div class="form-group">
                                <label for="InputFixcenter" class="col-sm-7 control-label">เลขเครื่อง</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputFixcenter" name="InputFixcenter">
                                </div>
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <label for="InputFixother" class="col-sm-7 control-label">เลขแซสซี</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputFixother" name="InputFixother">
                                </div>
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <label for="InputPremium" class="col-sm-7 control-label">ประเภทผู้ใช้รถ</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputPremium" name="InputPremium">
                                </div>
                            </div>
                        </td>
                        <td>  
                            <div class="form-group">
                                <label for="InputPremium" class="col-sm-7 control-label">ประเภทการติดตาม</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="InputPremium" name="InputPremium">
                                </div>
                            </div>
                        </td>
                    </tr>      
                </table>
                <div class="text-center" >
                    <a href="#"role="button" class="btn btn-primary" ><i class="fa fa-search-plus" aria-hidden="true"></i> ค้นหา</a>                                     

                </div>
            </form>

            <!-- /section:elements.tooltip -->
        </div>
    </div>
</div>