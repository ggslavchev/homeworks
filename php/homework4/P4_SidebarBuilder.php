<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Sidebar Builder</title>
    <style>
        aside {
            box-sizing: border-box;
            margin: 5px;
            border: solid 1px black;
            background: linear-gradient(#c5d6eb 50%, #abc4e5 50%, #c5d6eb, #7fa0cb);
            border-radius: 10px;
            width: 160px;
            overflow: hidden;
            padding-left: 10px;
        }
    </style>
    <?php
    if (isset($_GET['categories']) && isset($_GET['tags']) && isset($_GET['months'])) {
        if ($_GET['categories'] != '') {
            $categories = preg_split('/[\s,]+/', $_GET['categories'], -1, PREG_SPLIT_NO_EMPTY);
        }
        if ($_GET['tags'] != '') {
            $tags = preg_split('/[\s,]+/', $_GET['tags'], -1, PREG_SPLIT_NO_EMPTY);
        }
        if ($_GET['months'] != '') {
            $months = preg_split('/[\s,]+/', $_GET['months'], -1, PREG_SPLIT_NO_EMPTY) ;
        }
    }
    ?>
</head>
<body>
<form action="">
    <label for="categories">Categories</label>
    <input type="text" name="categories" id="categories" value="Knitting, Cycling, Swimming, Dancing" />
    <br />
    <label for="tags">Tags</label>
    <input type="text" name="tags" id="tags" value="person, free time, love, peace, protest" />
    <br />
    <label for="months">Months</label>
    <input type="text" name="months" id="months" value="April, May, June, July" />
    <br />
    <input type="submit" />
</form>
<div>
    <?php if (isset($categories)) : ?>
        <aside>
            <h2>Categories</h2>
            <hr />
            <ul>
                <?php for ($i=0; $i < count($categories); $i++) : ?>
                    <li>
                        <?php echo htmlentities($categories[$i]) ?>
                    </li>
                <?php endfor; ?>
            </ul>
        </aside>
    <?php endif;
    if (isset($tags)) : ?>
        <aside>
            <h2>Tags</h2>
            <hr />
            <ul>
                <?php for ($i=0; $i < count($tags); $i++) : ?>
                    <li>
                        <?php echo htmlentities($tags[$i]) ?>
                    </li>
                <?php endfor; ?>
            </ul>
        </aside>
    <?php endif;
    if (isset($months)) : ?>
        <aside>
            <h2>Months</h2>
            <hr />
            <ul>
                <?php for ($i=0; $i < count($months); $i++) : ?>
                    <li>
                        <?php echo htmlentities($months[$i]) ?>
                    </li>
                <?php endfor; ?>
            </ul>
        </aside>
    <?php endif; ?>
</div>
</body>
</html>