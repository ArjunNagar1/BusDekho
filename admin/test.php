 
         <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>

    <table class="table table-bordered table-responsive">
        <thead>
            <tr>
                <th>Station</th>
                <th>Arrival</th>
                <th>Departure</th>
                <th>Distance</th>
                <th></th>
            </tr>
        </thead>
        <!--
            For storing multiple values in php get array of fields
        -->
        <tbody>
            <tr>
                <td><input type="text" name="station[]" class="form-control"></td>
                <td><input type="text" name="arrival[]" class="form-control"></td>
                <td><input type="text" name="departure[]" class="form-control"></td>
                <td><input type="text" name="distance[]" class="form-control"></td>
                <td>
                <span class="glyphicon plus">&#x2b;</span>
                <span class="glyphicon alert-danger minus" style="display:none;">&#xe082;</span>
                </td>    												
            </tr>
        </tbody>
    </table>
 
<script>
$(document).ready(function() {
    $(".plus").click(function() {
        var cloneTr = $(this).closest('tr').clone();
        $(cloneTr).find('input').val("");
        $(cloneTr).find('.plus').hide();
        $(cloneTr).find('.minus').removeAttr('style');
        $(this).closest('tbody').append(cloneTr);
    });

    $(document).on("click",".minus",function() {
        $(this).closest('tr').remove();
    });
});

</script>