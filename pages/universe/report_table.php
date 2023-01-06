<h1>Sample Output(For Reference Only)</h1>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Establishment Name</th>
                <th>Address</th>
                <th>ECC Number</th>
                <th>Date Created</th>
                <th>Date Modified</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Petron Gasoline Station</td>
                <td>Tacloban City</td>
                <td>ECC-R08-OL-123456</td>
                <td>10/18/2022</td>
                <td>10/19/2022</td>
                <td>
                    <button type="button" class="btn btn-success">View</button>
                    <button type="button" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
            <td>Star Oil Gasoline Station</td>
                <td>Tacloban City</td>
                <td>ECC-R08-OL-654321</td>
                <td>10/20/2022</td>
                <td>10/20/2022</td>
                <td><button type="button" class="btn btn-success">View</button>
                    <button type="button" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-danger">Delete</button></td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Establishment Name</th>
                <th>Address</th>
                <th>ECC Number</th>
                <th>Date Created</th>
                <th>Date Modified</th>
                <th>Actions</th>

            </tr>
        </tfoot>
    </table>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
    $('#example').DataTable();
});
    </script>