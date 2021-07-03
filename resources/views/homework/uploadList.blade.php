
@if(count($getListing) > 0)
<hr>
<h5>Uploaded Documents</h5>
<div class="row">
    <div class="col s12">     
        <input type="hidden" value="{{count($getListing)}}" id="totalCount" />
        <table id="page-length-option" class="display">
            <thead>
                <tr>
                    <th style="text-align: center">S.No</th>
                    <th style="text-align: center">Session Date</th>
                    <th style="text-align: center">Uploaded On</th>
                    <th style="text-align: center">View Document</th>
                    <th style="text-align: center">Action</th>
                </tr>
            </thead>
            <tbody>                    
                @foreach($getListing as $key=>$val)
                <?php
                $studUserName = $val->getStudentDetail($val->getSessionDetail->student_id);
                $parentUserName = $val->getParentDetail($val->getSessionDetail->student_id);
                ?>
                <tr>
                    <td style="text-align: center">{{$key+1}}</td>
                    <td style="text-align: center">{{isset($val->getSessionDetail->session_date) ? date('l jS \of F Y h:i:s A',strtotime($val->getSessionDetail->session_date)) : ''}}</td>
                    <td style="text-align: center">{{isset($val->created_at) ? date('l jS \of F Y h:i:s A',strtotime($val->created_at)) : ''}}</td>                        
                    <td style="text-align: center">
                        <a href="{{url("/")}}/uploads/{{$parentUserName->username . '/' . $studUserName->username.'/'.$val->attachment_link}}" target="_blank" class="waves-effect waves-light btn" style="background-color: #736cb5;">View</a>
                    </td>
                    <td style="text-align: center">
                        <a href="javascript:void(0);" data-id="{{$val->id}}" onclick="return deleteListing({{$val->id}});" id="deleteAttachment" class="waves-effect waves-light btn" style="background-color: #736cb5;">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif

<script>
    function deleteListing(val){

    swal({
    title: "Are you sure?",
            text: "You will not be able to recover this file!",
            icon: 'warning',
            dangerMode: true,
            buttons: {
            cancel: 'No, Please!',
                    delete: 'Yes, Delete It'
            }
    }).then(function (willDelete) {
    if (willDelete) {
    swal("Your file has been deleted!", {
    icon: "success",
    });
    var deleteID = val;
    $.ajax({
    url: '{{url("/")}}' + '/homework-list/destroy',
            type: "POST",
            data: {"deleteID":deleteID, '_token': '{{ csrf_token() }}'},
            success: function (data) {
            var valueInput = $('#sessionDate').val();
            loadListing(valueInput);
            },
    });
    } else {
    swal("Your file is safe", {
    title: 'Cancelled',
            icon: "error",
    });
    }
    });
    }
</script>
