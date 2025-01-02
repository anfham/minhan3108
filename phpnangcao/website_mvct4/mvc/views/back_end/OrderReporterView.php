<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<table class="product-table">
    <tr>
        <th colspan="2">Báo cáo doanh thu theo năm</th>
    </tr>
    <tr>
        <th>Năm</th>
        <th>Doanh thu</th>
    </tr>
    <tbody>
        <?php if (!empty($data['reportByYear'])): ?>
            <?php foreach ($data['reportByYear'] as $row): ?>
                <tr>
                    <td><?= isset($row['year']) ? $row['year'] : 'Không xác định' ?></td>
                    <td><?= isset($row['total_revenue']) ? number_format($row['total_revenue']) . ' VNĐ' : '0 VNĐ' ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Không có dữ liệu báo cáo.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<canvas id="yearlyRevenueChart" width="400" height="200"></canvas>
<script>
    const yearlyReportData = <?= json_encode($data['reportByYear']) ?>;

    const yearlyLabels = yearlyReportData.map(row => row.year || "Không xác định");
    const yearlyRevenues = yearlyReportData.map(row => row.total_revenue || 0);

    const yearlyCtx = document.getElementById('yearlyRevenueChart').getContext('2d');

    new Chart(yearlyCtx, {
        type: 'bar', // Loại biểu đồ
        data: {
            labels: yearlyLabels, 
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: yearlyRevenues,
                backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                borderColor: 'rgba(54, 162, 235, 1)', 
                borderWidth: 1 
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<table class="product-table">
    <tr>
        <th colspan="13">Báo cáo doanh thu theo ngày</th>
    </tr>
    <tr>
        <th>Ngày</th>
        <th>Doanh thu</th>
    </tr>
    <tbody>
        <?php if (!empty($data['reportByDay'])): ?>
            <?php foreach ($data['reportByDay'] as $row): ?>
                <tr>
                    <td><?= isset($row['day']) ? $row['day'] : 'Không xác định' ?></td>
                    <td><?= isset($row['total_revenue']) ? number_format($row['total_revenue']) . ' VNĐ' : '0 VNĐ' ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Không có dữ liệu báo cáo.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
<canvas id="dailyRevenueChart" width="400" height="200"></canvas>
<script>
    const dailyReportData = <?= json_encode($data['reportByDay']) ?>;

    const dailyLabels = dailyReportData.map(row => row.day || "Không xác định");
    const dailyRevenues = dailyReportData.map(row => row.total_revenue || 0);

    const dailyCtx = document.getElementById('dailyRevenueChart').getContext('2d');

    new Chart(dailyCtx, {
        type: 'line', // Loại biểu đồ (đường)
        data: {
            labels: dailyLabels, 
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: dailyRevenues,
                backgroundColor: 'rgba(153, 102, 255, 0.2)', 
                borderColor: 'rgba(153, 102, 255, 1)', 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<table class="product-table">
    <tr>
        <th colspan="13">Báo cáo doanh thu</th>
    </tr> 
    <tr>
        <tr>
            <th>Tháng</th>
            <th>Doanh thu</th>
        </tr>
    </tr>
    <tbody>
        <?php if (!empty($data['report'])): ?>
            <?php foreach ($data['report'] as $row): ?>
                <tr>
                    <td><?= isset($row['month']) ? $row['month'] : 'Không xác định' ?></td>
                    <td><?= isset($row['total_revenue']) ? number_format($row['total_revenue']) . ' VNĐ' : '0 VNĐ' ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">Không có dữ liệu báo cáo.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>  
<tr>
        <canvas id="revenueChart" width="400" height="200"></canvas>
        <script>
            const reportData = <?= json_encode($data['report']) ?>;

            const labels = reportData.map(row => row.month || "Không xác định");
            const revenues = reportData.map(row => row.total_revenue || 0);

            const ctx = document.getElementById('revenueChart').getContext('2d');

            new Chart(ctx, {
                type: 'bar', // Loại biểu đồ (cột)
                data: {
                    labels: labels, 
                    datasets: [{
                        label: 'Doanh thu (VNĐ)',
                        data: revenues, 
                        backgroundColor: 'rgba(75, 192, 192, 0.2)', 
                        borderColor: 'rgba(75, 192, 192, 1)', 
                        borderWidth: 1 
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true // Bắt đầu từ 0 trên trục Y
                        }
                    }
                }
            });
        </script>
    </tr> 
