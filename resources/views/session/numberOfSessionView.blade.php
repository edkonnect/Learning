@if(isset($getsessionData) && count($getsessionData) > 0)
<table id="datatableDataRenderView" class="display">
    <thead>
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Month & Year</th>
            <th>Total Sessions Completed</th>
        </tr>
    </thead>
    <tbody>
        @if(isset($getsessionData) && count($getsessionData) > 0)
        @foreach($getsessionData as $getDataKeys=>$getDataVals)
        <tr>
            <td>{{isset($getDataVals->getStudentDetail)?$getDataVals->getStudentDetail->name:''}}</td>
            <td>{{isset($getDataVals->getCourseDetail->course_name)?$getDataVals->getCourseDetail->course_name:''}}</td>
            <td>{{isset($getDataVals->sessionDate)?date('F, Y',strtotime($getDataVals->sessionDate)):''}}</td>
            <td>{{isset($getDataVals->totalSessions)?$getDataVals->totalSessions:''}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
@endif

<script>
    $(document).ready(function () {
        $('#datatableDataRenderView').DataTable({
//    "responsive": true,
//        "scrollX": true,
            autoWidth: false,
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "All"]
            ], columnDefs: [
                {
                    render: function (data, type, full, meta) {
                        return "<div class='text-wrap width-200'>" + data + "</div>";
                    },
                    targets: 1
                }
            ],
        });
    });
</script>