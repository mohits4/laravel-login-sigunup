@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<style>
body {
	color: #566787;
	background: #f5f5f5;
	font-family: 'Varela Round', sans-serif;
	font-size: 13px;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
	background: #fff;
	padding: 20px 25px;
	border-radius: 3px;
	min-width: 1000px;
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {        
	padding-bottom: 15px;
	background: #435d7d;
	color: #fff;
	padding: 16px 30px;
	min-width: 100%;
	margin: -20px -25px 10px;
	border-radius: 3px 3px 0 0;
}
.table-title h2 {
	margin: 5px 0 0;
	font-size: 24px;
}
.table-title .btn-group {
	float: right;
}
.table-title .btn {
	color: #fff;
	float: right;
	font-size: 13px;
	border: none;
	min-width: 50px;
	border-radius: 2px;
	border: none;
	outline: none !important;
	margin-left: 10px;
}
.table-title .btn i {
	float: left;
	font-size: 21px;
	margin-right: 5px;
}
.table-title .btn span {
	float: left;
	margin-top: 2px;
}
table.table tr th, table.table tr td {
	border-color: #e9e9e9;
	padding: 12px 15px;
	vertical-align: middle;
}
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}	
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
}
.pagination {
	float: right;
	margin: 0 0 5px;
}
.pagination li a {
	border: none;
	font-size: 13px;
	min-width: 30px;
	min-height: 30px;
	color: #999;
	margin: 0 2px;
	line-height: 30px;
	border-radius: 2px !important;
	text-align: center;
	padding: 0 6px;
}
.pagination li a:hover {
	color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {        
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}    
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {    
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
.modal .modal-dialog {
	max-width: 400px;
}
.modal .modal-header, .modal .modal-body, .modal .modal-footer {
	padding: 20px 30px;
}
.modal .modal-content {
	border-radius: 3px;
	font-size: 14px;
}
.modal .modal-footer {
	background: #ecf0f1;
	border-radius: 0 0 3px 3px;
}
.modal .modal-title {
	display: inline-block;
}
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}	
.modal form label {
	font-weight: normal;
}	
</style>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Connection <b>List</b></h2>
					</div>
					 <div class="col-sm-6">
						<a href="javascript:void(0)" class="btn btn-success" id="new-customer" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Connection</span></a>
					</div> 
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<!-- <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th> -->
						<th>No.</th>
						<th>Destination</th>
						<th>Gateway</th>
						<th>Genmask</th>					
                        <th>Metric</th>
						<th>Tunnel IP</th>
						<th>Device Serial</th>					 						                      
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
				@php $no = 1; @endphp
                @foreach($connections as $connection)
					<tr>
						<td>{{ $no++ }}</td>						
						<td>{{$connection->destination}}</td>
                        <td>{{$connection->gateway}}</td>
						<td>{{$connection->genmask}}</td>						
						<td>{{$connection->metric}}</td>
						<td>{{$connection->tunnel_ip}}</td>
						<td>{{$connection->device_serial}}</td>						
						<td>
							<a href="#editEmployeeModal" class="connection_edit" conid="{{ $connection->id}}" tblinfoid="{{ $connection->tbl_info_id}}" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
							<a onclick="confirm_delete({{$connection->id}});" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>							
						</td>
					</tr>
                    @endforeach						
				</tbody>
			</table>
			<div class="clearfix">
				<!-- <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div> -->
				<ul class="pagination">
				
					<!-- <li class="page-item disabled"><a href="#">Previous</a></li>
					<li class="page-item"><a href="#" class="page-link">1</a></li>
					<li class="page-item"><a href="#" class="page-link">2</a></li>
					<li class="page-item active"><a href="#" class="page-link">3</a></li>
					<li class="page-item"><a href="#" class="page-link">4</a></li>
					<li class="page-item"><a href="#" class="page-link">5</a></li>
					<li class="page-item"><a href="#" class="page-link">Next</a></li> -->
				</ul>
			</div>
		</div>
	</div>        
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">						
					<h4 class="modal-title">Add Connection</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Destination</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Gateway</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>	Genmask</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Metric</label>
						<input type="text"  class="form-control" required>
					</div>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="POST" action ="{{ url('connection/update', $connection->id )}}">
			@csrf
			<input type="hidden" name="selectitem" id="selectitem" value="">
			<input type="hidden" name="selecttblinfoitem" id="selecttblinfoitem" value="">
				<div class="modal-header">						
					<h4 class="modal-title">Edit List</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<div class="form-group">
						<label>Destination</label>
						<input type="text" id="destination" name="destination" value="{{$connection->destination}}" class="form-control" required>
					</div>
					<div class="form-group">
						<label>gateway</label>
						<input type="text" id="gateway" name="gateway" value="{{$connection->gateway}}" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Genmask</label>
						<input type="text" id="genmask" name="genmask" value="{{$connection->genmask}}" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Metric</label>
						<input type="text" id="metric" name="metric" value="{{$connection->metric}}" class="form-control" required>
					</div>		
					<div class="form-group">
						<label>Tunnel IP</label>
						<input type="text" id="tunnel_ip" name="tunnel_ip" value="{{$connection->tunnel_ip}}" class="form-control" required>
					</div>	
					<div class="form-group">
						<label>Device Serial</label>
						<input type="text" id="device_serial" name="device_serial" value="{{$connection->device_serial}}" class="form-control" required>
					</div>				
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" id="update" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div> 
  <!-- Delete Modal HTML -->
  <div id="delete_confirm" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">         
				<div class="modal-header">						
					<h4 class="modal-title">Delete Connection</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">					
					<p>Are you sure you want to delete these Records?</p>					
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<span id="delete_butt_id"></span>
				</div>			
		</div>
	</div>
</div>





<!--  -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="customerCrudModal"></h4>
</div>
<div class="modal-body">
<form name="custForm" action="{{ url('connection/store')}}" method="POST">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<!-- <input type="hidden" name="cust_id" id="cust_id" > -->
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Destination:</strong>
<input type="text" name="destination" id="destination" class="form-control @error('destination') is-invalid @enderror" onchange="validate()">
@error('destination')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Gateway:</strong>
<input type="text" name="gateway" id="gateway" class="form-control" onchange="validate()" required>
@error('destination')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Genmask:</strong>
<input type="text" name="genmask" id="genmask" class="form-control" onchange="validate()" required>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Metric:</strong>
<input type="text" name="metric" id="metric" class="form-control" onchange="validate()" required>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Tunnel IP:</strong>
<input type="text" name="tunnel_ip" id="tunnel_ip" class="form-control" onchange="validate()" required>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Device Serial:</strong>
<input type="text" name="device_serial" id="device_serial" class="form-control" onchange="validate()" required>
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary">Submit</button>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</body>


<!-- For validate Model -->
<script>
	@if (count($errors) > 0)
		$('#crud-modal').modal('show');
	@endif
</script>
<!-- For add -->
<script type="text/javascript">
$('#new-customer').click(function () {
$('#btn-save').val("create-customer");
$('#customer').trigger("reset");
$('#customerCrudModal').html("Add New Connection");
$('#crud-modal').modal('show');
});

/*
For Update
*/
$('.connection_edit').on('click',function () {
    var user_id = $(this).attr('conid');
	var tbl_info_id = $(this).attr('tblinfoid');
	$('#editEmployeeModal').find('#selectitem').val(user_id);
	$('#editEmployeeModal').find('#selecttblinfoitem').val(tbl_info_id);
     $.ajax({
        url: "/getUserData",
        type: "get",
        data: {user_id: user_id, tbl_info_id: tbl_info_id} ,
        success: function (response) {
          console.log(response); 		          
           $('#destination').val(response[0]['destination']);
           $('#gateway').val(response[0]['gateway']);
           $('#genmask').val(response[0]['genmask']);
           $('#metric').val(response[0]['metric']);
		   $('#tunnel_ip').val(response[0]['tunnel_ip']);
		   $('#device_serial').val(response[0]['device_serial']);
        },
    });
  });
/*
For Delete
*/
function confirm_delete(id){
  var url="{{url('connection-list/delete/')}}";
  var a='<a href="'+url+'/'+id+'" class="btn btn-primary">Confirm</a>';
  $("#delete_butt_id").html(a);
  $("#delete_confirm").modal();
}
</script>
</html>
@endsection