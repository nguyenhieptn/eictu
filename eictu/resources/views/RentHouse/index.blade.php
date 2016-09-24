    @extends('layouts.app')
    @section('title')
    eICTuStudentRentHouseSearch - Tra cứu địa chỉ nhà trọ của Sinh viên
    @endsection
  @section('content')

  <div class="container">
    <?php
    if(Auth::guest()){
    }
    elseif(auth()->user()->type==3){
      ?>
    <div class="row">
        <div class="col-sm-12">
            <a STYLE="color:#000;" href="{{"rentHouse/create"}}"><h3 class="redirect"><i class="glyphicon glyphicon-star">&nbsp;</i>SINH VIÊN CẬP NHẬT NHÀ TRỌ</h3></a>
        </div>
    </div>
    <?php
    }
      ?>
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Đây là màn hình tìm kiếm thông tin nhà trọ của sinh viên bằng mã số sinh viên.</div>
                  <div class="panel-body">
                    <form action="{{url("rentHouse")}}" method="get" class="form-horizontal" accept-charset="utf-8">
                        <div class="form-group" style="padding:8px;">
                            <label class="col-sm-3 control-label" ><i class=" glyphicon glyphicon-search">&nbsp;</i>Mã số sinh viên:</label>
                            <div class="col-sm-4">
                                <input type="text" name="code" value="" class="form-control" placeholder="DTC...">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn" style="background: #000;"><strong style="color:#ffffff">Tìm kiếm</strong></button>
                            </div>
                        </div>
                    </form>
                  </div>
              </div>
              <div class="panel panel-default">
                <ul class="list-group">
                <li class='list-group-item active'><strong style="font-size:18px;"> <?php echo $name;?></strong></li>
                 <?php
                    $stt=1;
                    if(!isset($data)){
                        echo "<li class='list-group-item' style='color:red'>Không có dữ liệu</li>";
                    }else{
                        foreach($data as $item){
                            $date = new DateTime($item->date_join);
                            echo "<li class='list-group-item ' style=' color:red '>
                                <i class='glyphicon glyphicon-triangle-right' style='color:#8c8c8c'> &nbsp;</i>".$date->format('d/m/Y').", ".$item->hostess.", ".$item->address."</li>";
                            }
                            echo "<center>".$data->appends(Request::only('code'))->links()."</center>";
                        }
                        ?>
                </ul>
                </div>
          </div>
      </div>
  </div>
  @endsection
