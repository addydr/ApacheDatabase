<?php include '../view/header.php'; ?>
<?php include '../view/BasicFormFuncs.php'; ?>

<main>
    <aside>
        <h1>Edit Employee</h1>
        <br>
        <a href="../.">Home</a>
        <nav>
    </aside>

    <section>
        <h1><b>Emp No:</b> <?php echo $employee->getEmpNo(); ?></h1>
        <div id="right_column">
        <form action="index.php" method="post">
            <input type="hidden" name="action" value="update_employee"/>
            <input type="hidden" name="emp_no"
                   value="<?php echo $employee->getEmpNo(); ?>" />

            First Name: <INPUT TYPE="text" NAME="firstName" SIZE=14 VALUE="<?php echo htmlspecialchars($employee->getFirstName());?>">
            <br>
            Last Name: <INPUT TYPE="text" NAME="lastName" SIZE=16 VALUE="<?php echo htmlspecialchars($employee->getLastName());?>">
            <br>
            Birth Date: <INPUT TYPE="date" NAME="birthDate" SIZE=5 VALUE="<?php echo formatDateSelector($employee->getBirthDate());?>">
            <br>
            Hire Date: <INPUT TYPE="date" NAME="hireDate" SIZE=5 VALUE="<?php echo formatDateSelector($employee->getHireDate());?>">
            <br><!-- comment -->
            Gender:
            <SELECT name="gender">
            <OPTION VALUE="F" 
            <?php  setSelected($employee->getGender(),"F");?>
            >F

            <OPTION VALUE="M" 
            <?php  setSelected($employee->getGender(),"M");?>
            >M    
            </SELECT> 

            
            <BR><BR>
        <input type="submit" value="Submit"/>
        </form>

        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>