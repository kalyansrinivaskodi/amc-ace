<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate A</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        label {
            display: inline-block;
            width: 100px;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        input[type="number"] {
            width: 150px;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body><br><br>
    <div class="container"><br><br><br><br>
        <h2>Calculate A (change the values as you wish)</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="I1">I:</label>
            <input type="number" id="I1" name="I1" value="<?php echo isset($_POST['I1']) ? $_POST['I1'] : '31.5'; ?>" required><br>

            <label for="Tm1">Tm:</label>
            <input type="number" id="Tm1" name="Tm1" value="<?php echo isset($_POST['Tm1']) ? $_POST['Tm1'] : '300'; ?>" required><br>

            <label for="Ta1">Ta:</label>
            <input type="number" id="Ta1" name="Ta1" value="<?php echo isset($_POST['Ta1']) ? $_POST['Ta1'] : '47'; ?>" required><br>

            <label for="Tr1">Tr:</label>
            <input type="number" id="Tr1" name="Tr1" value="<?php echo isset($_POST['Tr1']) ? $_POST['Tr1'] : '20'; ?>" required><br>

            <label for="ar1">ar(alpha r):</label>
            <input type="number" id="ar1" name="ar1" value="<?php echo isset($_POST['ar1']) ? $_POST['ar1'] : '0.00377'; ?>" required><br>

            <label for="pr1">pr(row r):</label>
            <input type="number" id="pr1" name="pr1" value="<?php echo isset($_POST['pr1']) ? $_POST['pr1'] : '15.9'; ?>" required><br>

            <label for="K01">K0:</label>
            <input type="number" id="K01" name="K01" value="<?php echo isset($_POST['K01']) ? $_POST['K01'] : '10'; ?>" required><br>

            <label for="tt1">tt:</label>
            <input type="number" id="tt1" name="tt1" value="<?php echo isset($_POST['tt1']) ? $_POST['tt1'] : '10'; ?>" required><br>

            <label for="TCAP1">TCAP:</label>
            <input type="number" id="TCAP1" name="TCAP1" value="<?php echo isset($_POST['TCAP1']) ? $_POST['TCAP1'] : '10'; ?>" required><br>

            <label for="SH1">SH:</label>
            <input type="number" id="SH1" name="SH1" value="<?php echo isset($_POST['SH1']) ? $_POST['SH1'] : '10'; ?>" required><br>

            <label for="SW1">SW:</label>
            <input type="number" id="SW1" name="SW1" value="<?php echo isset($_POST['SW1']) ? $_POST['SW1'] : '10'; ?>" required><br>

            <button type="submit">Calculate A</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $I1 = $_POST['I1'];
            $Tm1 = $_POST['Tm1'];
            $Ta1 = $_POST['Ta1'];
            $Tr1 = $_POST['Tr1'];
            $ar1 = $_POST['ar1'];
            $pr1 = $_POST['pr1'];
            $K01 = $_POST['K01'];
            $tt1 = $_POST['tt1'];
            $TCAP1 = $_POST['TCAP1'];
            $SH1 = $_POST['SH1'];
            $SW1 = $_POST['SW1'];

            $tcap1 = $TCAP1 * pow(10, -4);
            $x1 = sqrt((($tcap1) / ($tt1 * $ar1 * $pr1)) * log(($K01 + $Tm1) / ($K01 + $Ta1)));


            $A1 = $I1 / $x1;

            echo "<p>A = " . $A1 . "</p>";
            echo "'$'tcap1 = '$'TCAP1 * pow(10, -4)<br>;<br>
            '$'x1 = sqrt((('$'tcap1) / ('$'tt1 * '$'ar1 * '$'pr1)) * log(('$'K01 + '$'Tm1) / ('$'K01 + '$'Ta1)));";

        }
        ?>
    </div>
</body>
</html>
