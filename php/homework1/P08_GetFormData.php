<style>
    input {
        margin: 5px;
    }
</style>
<form>
    <input type="text" name="name" placeholder="Name" > <br>
    <input type="text" name="age" placeholder="Age"> <br>
    <input type="radio" name="sex" value="male" checked>Male<br>
    <input type="radio" name="sex" value="female">Female<br>
    <input type="submit" value="Submit" name="posted">

</form>
<?php
    if (isset($_GET['posted'])){
        echo  'My name is ',$_GET['name'],'. ';
        echo  'I am ',$_GET['age'],' years old. ';
        echo  'I am ',$_GET['sex'],'. ';
    }