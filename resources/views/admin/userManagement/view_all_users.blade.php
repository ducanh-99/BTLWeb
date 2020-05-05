<div>
    Liệt kê danh sách người dùng
</div>
<div class="table-responsive">
    <table class="table table-striped b-t b-light">
        <thead>
        <tr>
            <th>id_customer</th>
            <th>name</th>
            <th>email</th>
            <th>password</th>
            <th>phone_number</th>
            <th>address</th>
            <th>credit</th>
            <th>status</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUser as $eachUser)
            <tr>
                <td>{{ $eachUser->id_customer }}</td>
                <td>{{ $eachUser->name }}</td>
                <td>{{ $eachUser->email }}</td>
                <td>{{ $eachUser->password }}</td>
                <td>{{ $eachUser->phone_number }}</td>
                <td>{{ $eachUser->address }}</td>
                <td>{{ $eachUser->credit }}</td>
                <td>{{ $eachUser->status }}
                    <?php
                    if($eachUser->status == 0){ //bị block
                    ?>
                    <a href="{{URL::to('/unblock-user/'.$eachUser->id_customer)}}">Unblock</a>
                    <?php
                    }else{ //if ($eachUser->_status==1) // active
                    ?>
                    <a href="{{URL::to('/block-user/'.$eachUser->id_customer)}}">Block</a>
                    <?php
                    }
                    ?>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
