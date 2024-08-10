<?php include '../view/header.php'; ?>
<?php include '../view/BasicFormFuncs.php'; ?>

<main>
    <aside>
        <h1>Add an Employee</h1>
        <br>
        <a href="../.">Home</a>
        <nav>
    </aside>

    <section>
        <div id="right_column">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="insert_employee"/>
            First Name: <INPUT TYPE="text" NAME="firstName" SIZE=14 VALUE="">
            <br>
            Last Name: <INPUT TYPE="text" NAME="lastName" SIZE=16 VALUE="">
            <br>
            Birth Date: <INPUT TYPE="date" NAME="birthDate" SIZE=5 VALUE="">
            <br>
            Hire Date: <INPUT TYPE="date" NAME="hireDate" SIZE=5 VALUE="">
            <br><!-- comment -->
            Gender:
            <SELECT name="gender">
            <OPTION VALUE="F" selected>F
            <OPTION VALUE="M" >M    
            </SELECT> 

            
            <BR><BR>
        <input type="submit" value="Submit"/>
        </form>

        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>