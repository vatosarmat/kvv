<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Test task</title>
    <style>
        .success {
            color: #479c1c;
        }

        .error {
            color: #9c1c23;
        }

        code {
            background-color: #e6e6e6;
            padding: .2em;
        }

        main {
            width: 80%;
            margin: auto;
            margin-top: 2em;

            display: flex;
            flex-direction: column;
            gap: 1em;
        }

        form {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1em;
        }

        form > input[type=text] {
            flex-grow: 1;
        }

    </style>
</head>
<body>
    <main>
        <?php
        $stringToValidate = htmlspecialchars($_GET['stringToValidate']);
        ?>
        <form action="" method="get">
            <label for="stringToValidate">String to validate:</label>
            <input type="text" name="stringToValidate" id="stringToValidate" value="<?php echo $stringToValidate; ?>">
            <input type="submit">
        </form>
        <?php
        if ($stringToValidate) {
            require_once dirname(__DIR__).'/src/StringValidator.php';

            $result = (new \App\StringValidator($stringToValidate))->validateBrackets();

            if ($result) {
                echo "<p>String <code>$stringToValidate</code> is <span class=\"success\">valid</span></p>";
            } else {
                echo "<p>String <code>$stringToValidate</code> is <span class=\"error\">invalid</span></p>";
            }
        }
        ?>
    </main>
</body>
</html>
