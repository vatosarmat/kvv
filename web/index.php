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
            gap: 2em;
        }

        #php-task form {
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 1em;
        }

        #php-task form > input[type=text] {
            flex-grow: 1;
        }

        #javascript-task .hide-me {
            position: relative;
            overflow: hidden;

            transition-property: height;
            transition-delay: 0;
            transition-duration: .5s;
        } 

        #javascript-task .hide-me.hidden {
            height: 0 !important;
        } 

    </style>
</head>
<body>
<main>
    <div id="php-task">
        <?php
        $stringToValidate = isset($_GET['stringToValidate']) ? htmlspecialchars($_GET['stringToValidate']) : '';
        ?>
        <form action="" method="get">
            <label for="stringToValidate">String to validate:</label>
            <input type="text" required name="stringToValidate" id="stringToValidate" value="<?php echo $stringToValidate; ?>">
            <input type="submit">
        </form>
        <?php
        if ($stringToValidate) {
            require_once dirname(__DIR__).'/src/StringValidator.php';

            $result = (new \App\StringValidator($stringToValidate))->validateBrackets();

            if ($result === true) {
                echo "<p>String <code>$stringToValidate</code> is <span class=\"success\">valid</span></p>";
            } else {
                echo "<p>String <code>$stringToValidate</code> is <span class=\"error\">invalid</span>($result[1])</p>";
            }
        }
        ?>
    </div>
    <div id="javascript-task">
        <p class="hide-me">Lorem quis odit repellat sapiente ab dolores! Accusantium eius ea doloribus repellendus dolores Quis facere debitis debitis laudantium nemo ab Expedita iure blanditiis totam culpa qui assumenda? Enim mollitia debitis dolor ipsam totam nulla Quia praesentium laboriosam aspernatur et quasi. Aliquid repellendus architecto quo architecto autem Assumenda excepturi consectetur laboriosam molestiae nemo! Sequi quis eius voluptatem incidunt debitis nostrum ex? Atque qui officiis asperiores necessitatibus ad Debitis ducimus at modi praesentium cum. Inventore dolor dignissimos deleniti culpa ducimus, quae Quod architecto nesciunt dignissimos saepe illum Similique similique nobis aspernatur dicta ex? Minus eveniet illum delectus ad ab! Corrupti voluptate autem</p>

        <div class="buttons">
            <button>Toggle</button>
            <button disabled>paragraph</button>
        </div>
    </div>
</main>
<script>

addEventListener('load', () => {
    const paragraph = document.querySelector('#javascript-task .hide-me')
    const buttons = document.querySelectorAll('#javascript-task .buttons button')

    paragraph.style.height = `${paragraph.scrollHeight}px`;

    const State = {
        get button2Enabled() {
            return !buttons[1].hasAttribute('disabled')
        },

        set button2Enabled(value) {
            buttons[1].toggleAttribute('disabled', !value)
        },

        toggleParagraph() {
            paragraph.classList.toggle('hidden')
        }
    }

    buttons[0].addEventListener('click', () => {
        State.button2Enabled = true
    })

    buttons[1].addEventListener('click', () => {
        if(State.button2Enabled) {
            State.button2Enabled = false
            State.toggleParagraph()
        }
    })
})
</script>
</body>
</html>
