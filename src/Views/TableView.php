<!DOCTYPE html>
<html>
    <head>
        <title>Transactions</title>
        <style media="all"><?php include_once __DIR__ . '/../Styles/TableStyles.css'; ?></style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Check</th>
                    <th>Description</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($contents as $value) {
                    foreach ($value as $value1) {
                        echo '<tr>';
                        echo '<td>' . date('M d, Y', strtotime($value['Date'])) . '</td>';
                        echo '<td>' . $value['Check'] . '</td>';
                        echo '<td>' . $value['Description'] . '</td>';
                        $value['Amount'] = floatval(str_replace(['$', ','], '', $value['Amount']));
                        if ($value['Amount'] < 0) {
                            echo '<td>' . '<span class="red">' . '-' . '$' . number_format(abs($value['Amount']), 2) . '<span>' . '</td>'; 
                        } else {
                            echo '<td>' . '<span class="green">' . '$' . number_format($value['Amount'], 2) . '<span>' . '</td>'; 
                        } 
                        echo '</tr>';

                        break;
                    }
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Income: </th>
                    <td><?php echo '$' . number_format($totals['Income'], 2) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Total Expense: </th>
                    <td><?php echo '-' . '$' . number_format($totals['Expense'], 2) ?></td>
                </tr>
                <tr>
                    <th colspan="3">Net Total: </th>
                    <td><?php echo '$' . number_format($totals['Net'], 2) ?></td>
                </tr>
            </tfoot>
        </table>
    </body>
</html>
