              <?php

                                if(isset($_POST['buscar'])){
                                $buscaF = $_POST['buscaF'];
                                $valorF = $_POST['valorF'];
                                $result = $s_clinico->buscaFuncionario($buscaF, $valorF);
                                  foreach ($result as $res => $value) {

                                
                                ?>
                                
                                <tbody>
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                            <label class="form-check-label" for="defaultCheck1">
                                                
                                            </label>
                                        </div>
                                    </th>
                                    <td><?php echo $value->cod_funcionario; ?></td>
                                    <td><?php echo $value->nome; ?></td>
                                    <td><?php echo $value->cpf; ?></td>
                                    <td><?php echo $value->email; ?></td>
                                    <td><?php echo $value->telefone; ?></td>
                                    <td><?php echo $value->ceular1; ?></td>
                                    <td><?php echo $value->celular2; ?></td>
                                    <td><?php echo $value->usuario; ?></td>
                                </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    
                                                </label>
                                            </div>
                                        </th>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                        <td>-------</td>
                                    </tr>
                                </tbody>
                                <?php      
                                  }
                                  ?>
                            </table> 

                            <?php    
        
                              }
                              ?>