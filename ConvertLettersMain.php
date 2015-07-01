<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Case Swaper</title>
</head>
<body>
    <br>
    <br>
    <br>
<h1 align="center">Yusuf's Case Swapper</h1>

    <p align="center"> This program
        reads in a text file from a given URL (the default URL is
        <a href="https://staff.fnwi.uva.nl/t.h.koornwinder/art/informal/KLSadd.tex" color="">https://staff.fnwi.uva.nl/t.h.koornwinder/art/informal/KLSadd.tex</a>)
        and replaces for a given letter, the case fo that letter. (There is also an option to
        replace the case of all letters simultaneously). The user can choose the name of the
        output text file which, by default, is saved (in Firefox) to the Downloads directory.
    </p>

    <br>
    <br>
    <form action="alternative_swap.php" method="post">
        <table align="center">
            <tr>
                <td>URL:</td>
                <td> <input type="text" value="https://staff.fnwi.uva.nl/t.h.koornwinder/art/informal/KLSadd.tex"name="url"></td>
            </tr>
            <tr>
                <td>File Name:</td>
                <td><input type="text" value="Sample_Name.tex"name="newfilename"> </td>
            </tr>
        </table>
        <p align="center">
            <select name="lettersDDMenu">
                <?php
                    $first = ["All Letters"];
                    $options = array_merge($first, str_split("ABCDEFGHIJKLMNOPQRSTUVWXYZ"));
                foreach ($options as $option) {
                        echo "<option value=\"$option\">$option</option>";
                    }
                ?>
            </select>
            <input type="submit"value="Convert"align="center">
        </p>
    </form>
</body>
</html>