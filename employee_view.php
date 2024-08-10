<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>View Employee</h1>
        <br>
        <a href="../.">Home</a>
        <nav>
    </aside>
    <!-- display buttons -->
    <div class="last_paragraph">
         <form action="." method="post" id="edit_button_form" style = "display:inline">
            <input type="hidden" name="action" value="show_edit_employee"/>
            <input type="hidden" name="emp_no"
                   value="<?php echo $employee->getEmpNo(); ?>" />
            <input type="submit" value="Edit Employee" />
        </form>
        <form action="." method="post" style = "display:inline">
            <input type="hidden" name="action" value="delete_employee"/>
            <input type="hidden" name="emp_no"
                   value="<?php echo $employee->getEmpNo(); ?>" />
            <input type="submit" value="Delete Employee"/>
        </form>
            <form action="." method="post" id="assign_to_dept_form" style = "display:inline">
            <input type="hidden" name="action" value="show_assign_employee_dept"/>
            <input type="hidden" name="emp_no"
                   value="<?php echo $employee->getEmpNo(); ?>" />
            <input type="submit" value="Assign Employee to Dept" />
        </form>

    </div>
        <?php if (isset($_SESSION["CRUD_Result"]))
        {
            echo $_SESSION["CRUD_Result"];
            unset($_SESSION["CRUD_Result"]);
        }
        ?>
    <section>
        <h1><?php echo $employee->getFullName(); ?></h1>
        <div id="right_column">
            <p><b>Emp No:</b> <?php echo $employee->getEmpNo(); ?></p> 
            <p><b>Birth Date:</b> <?php echo $employee->getBirthDate(); ?></p>
            <p><b>Hire Date:</b> <?php echo $employee->getHireDate(); ?></p>
            <p><b>Gender:</b> <?php echo $employee->getGender(); ?></p>
        </div>
    </section>
</main>
<?php include '../view/footer.php'; ?>