<?php
include('config.php');

    $sql = 'SELECT * FROM users';
    $results = mysqli_query($conn,$sql);
    if($results->num_rows > 0){
        while($row = $results->fetch_assoc()){
            echo '
                <tr class="flex w-full h-16 items-center justify-center border-b text-left">
                    <th scope="row" class="p-5  w-1/4 font-medium text-gray-900 whitespace-nowrap font-bold truncate">'.$row['fname'].' '.$row['lname'].'</th>
                    <td class="p-5 w-1/4 truncate">'.$row['email'].'</td>
                    <td class="p-5 w-1/4 truncate">'.$row['password'].'</td>
                    <td class="p-5 w-1/4 truncate">'.$row['numbers'].'</td>
                    <td class="p-5 w-1/4 truncate"><a href="../files/'.$row['valid_id'].' " target="_blank" class="text-blue-600 dark:text-blue-400 hover:underline">' .$row['valid_id'].'</a></td>
  


                    
                    <td class="p-5 w-1/4 truncate">'.$row['status'].'</td>
                    <td class="p-5 w-1/4 truncate">₱'.$row['money'].'</td>





                </tr>
            ';
        }
    }else{
        return false;
    }
    ?>