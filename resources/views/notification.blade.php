<html>
    <body>
        <center>
            <p>
                Cars Store xin cảm ơn {{ $data['name'] }} đã sử dụng dịch vụ thuê xe của chúng tôi, 
                chúc quý khách có một ngày tốt lành.
            </p>
            <p>
                Lịch thuê xe của quý khách
                <table>
                    <thead>
                        <tr>
                            <th>Xe</th>
                            <th>Ngày bắt đầu thuê</th>
                            <th>Thời gian bắt đầu thuê</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $data['car_name'] }}</td>
                            <td>{{ $data['start_date_at'] }}</td>
                            <td>{{ $data['start_time_at'] }}</td>
                        </tr>
                    </tbody>
                </table>
            </p>
        </center>
    </body>
</html>