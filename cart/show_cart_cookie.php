<?php

// after the page reloads, print them out
if (isset($_COOKIE['cookie'])) {
    foreach ($_COOKIE['cookie'] as $name => $value) {
        $name = htmlspecialchars($name);
        $value = htmlspecialchars($value);
        
         echo "<table>
            <tr>
            <th>Book ID</th>
            <th>Member</th>
            <th>Quantity</th>
            </tr>";

        echo "<form method='post'>";
        echo "<tr>";
        echo "<td>". $value . "</td>";
        echo "<td>Guest</td>";
        echo "<td>1</td> " ;
        echo "<td><input type='text' name='id[]' value='".$value."' hidden/></td>";
        echo "</tr>";
        
        echo "</table>";
        
        echo "<input type='submit' name='submit' value='Send to Cart' />";
        echo "</form>";
    }
}

?>