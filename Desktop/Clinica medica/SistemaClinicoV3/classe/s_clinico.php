<?php

// RECEBE OS DADOS DA CONEXÃO E EXTEND CONEXAO
require_once 'conexao.php';

class s_clinico extends conexao{

	protected $table = 'paciente';
	protected $table2 = 'funcionario';
	protected $table3 = 'nro_telefone';
	protected $table4 = 'telefone';
	protected $table5 = 'estado';
	protected $table6 = 'consulta';
	protected $table7 = 'medico';
	protected $table8 = 'telefone_medico';

	
	private $especialidade;
	private $id;
	private $prescricao;
	private $medicamento;
	private $evolu_obs;
	private $nome_med;
	private $CRM;
	private $usuario;
	private $senha;
	private $cpf;
    private $nome;
    private $RG;
    private $orgao_emissor;
    private $data_emissao;
    private $sexo;
    private $data_nascimento;
    private $endereco;
    private $numero;
    private $CEP;
    private $cidade;
    private $cod_estado;
    private $telefone;
    private $celular1;
    private $celular2;
    private $email;
    private $cod_funcionario;
    private $tipoFuncionario;
    private $buscaF;
    private $valorF;
   


    public function setTel_med($tel_med){
		$this->tel_med = $tel_med;
	}
    public function setPrescricao($prescricao){
		$this->prescricao = $prescricao;
	}
    public function setMedicamento($medicamento){
		$this->medicamento = $medicamento;
	}
    public function setEvolu_obs($evolu_obs){
		$this->evolu_obs = $evolu_obs;
	}
    public function setCRM($CRM){
		$this->CRM = $CRM;
	}
	public function setEspecialidade($especialidade){
		$this->especialidade = $especialidade;
	}
    public function setNome_med($nome_med){
		$this->nome_med = $nome_med;
	}
    public function setID($id){
		$this->id = $id;
	}
	public function setCod_Estado($cod_estado){
		$this->cod_estado = $cod_estado;
	}
	public function setUsuario($usuario){
		$this->usuario = $usuario;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}

	public function setRG($RG){
		$this->RG = $RG;
	}
	public function setNome($nome){
		$this->nome = $nome;
	}
	public function setOrgao_emissor($orgao_emissor){
		$this->orgao_emissor = $orgao_emissor;
	}
	public function setData_emissao($data_emissao){
		$this->data_emissao = $data_emissao;
	}
	public function setSexo($sexo){
		$this->sexo = $sexo;
	}
	public function setData_nascimento($data_nascimento){
		$this->data_nascimento = $data_nascimento;
	}
	public function setLogradouro($logradouro){
		$this->logradouro= $logradouro;
	}
	public function setNumero($numero){
		$this->numero = $numero;
	}
	public function setCEP($CEP){
		$this->CEP = $CEP;
	}
	public function setCidade($cidade){
		$this->cidade = $cidade;
	}
	public function setEstado($estado){
		$this->estado = $estado;
	}
	public function setTelefone($telefone){
		$this->telefone = $telefone;
	}
	public function setCelular1($celular1){
		$this->celular1 = $celular1;
	}
	public function setCelular2($celular2){
		$this->celular2 = $celular2;
	}
	public function setCod_funcionario($cod_funcionario){
		$this->cod_funcionario = $cod_funcionario;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function setTipoFuncionario($tipoFuncionario){
		$this->tipoFuncionario = $tipoFuncionario;
	}
	public function setBuscaF($buscaF){
		$this->buscaF = $buscaF;
	}
	public function setValorF($valorF){
		$this->valorF = $valorF;
	}


	
	public function insert_medico(){
		try{
			$sql = "INSERT INTO $this->table7(CRM,nome,especialidade,cpf,email,usuario,senha) VALUES (:CRM,:nome,:especialidade,:cpf,:email,:usuario,:senha)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':especialidade', $this->especialidade);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':usuario', $this->usuario);
			$stmt->bindParam(':senha', $this->senha);
			

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

public function update_medico(){
		try{
			$sql = "UPDATE $this->table7 SET  CRM = :CRM, nome = :nome,especialidade = :especialidade, usuario = :usuario, senha = :senha WHERE CRM = :CRM";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':especialidade', $this->especialidade);
			//$stmt->bindParam(':cpf', $this->cpf);
			//$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':usuario', $this->usuario);
			$stmt->bindParam(':senha', $this->senha);

			return $stmt->execute();
		}
		catch(Exception $e){

		}
	}
	public function login(){
		//CONSULTA SE EXISTE FUNCIONARIO COM O LOGIN E SENHA INFORMADOS
		$sql = "SELECT cpf FROM $this->table2 WHERE usuario = :usuario AND senha = :senha";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':usuario', $this->usuario);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->execute();
		// ASSOCIA O RESULTADO DA BUSCA COM A MATRICULA DO FUNCIONARIO
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $item){
			$cpf = $item['cpf'];
		}
		// VERIFICA SE HOUVE RESPOSTA DO BANCO
		session_start();
		if (count($result) <= 0){
		$sql = "SELECT cpf FROM $this->table7 WHERE usuario = :usuario AND senha = :senha";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':usuario', $this->usuario);
		$stmt->bindParam(':senha', $this->senha);
		$stmt->execute();
		// ASSOCIA O RESULTADO DA BUSCA COM A MATRICULA DO FUNCIONARIO
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $item){
			$cpf = $item['cpf'];
		}
		}
		if (count($result) <= 0)
		{
			?>
			<div class="text-danger" role="alert">Usuário ou senha inválido(s)</div>
			<?php
			$_SESSION['autenticado'] = 'nao';
		// SE HOUVE RESPOSTA INICIA A SESSÃO E ARMAZENA A MATRICULA DO FUNCIONÁRIO
		}if(count($result) > 0){
			
			$_SESSION['cpf'] = $cpf;
			$_SESSION['autenticado'] = 'sim';
			header('Location: inicio.php?cpf='.$cpf);
		}
	}




public function insert_consulta(){
		try{
			$sql = "INSERT INTO $this->table6(id,nome_med,especialidade,CRM,cpf,nome,data_nascimento,sexo,evolu_obs,medicamento,prescricao) VALUES 
			(:id,:nome_med,:especialidade,:CRM,:cpf,:nome,:data_nascimento,:sexo,:evolu_obs,:medicamento,:prescricao)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':id', $this->id);
			$stmt->bindParam(':nome_med', $this->nome_med);
			$stmt->bindParam(':especialidade', $this->especialidade);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':data_nascimento', $this->data_nascimento);
			$stmt->bindParam(':sexo', $this->sexo);
			$stmt->bindParam(':evolu_obs', $this->evolu_obs);
			$stmt->bindParam(':medicamento', $this->medicamento);
			$stmt->bindParam(':prescricao', $this->prescricao);

			return $stmt->execute();
		}
		catch(Exception $e){

		}
	}

public function update_Consulta(){
		try{
			$sql = "UPDATE $this->table6 SET  id = :id, nome_med = :nome_med,especialidade = :especialidade, CRM = :CRM, cpf = :cpf, nome = :nome, data_nascimento = :data_nascimento, sexo = :sexo, evolu_obs = :evolu_obs, medicamento = :medicamento, prescricao = :prescricao  
			WHERE cpf = :cpf";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':id', $this->id);
			$stmt->bindParam(':nome_med', $this->nome_med);
			$stmt->bindParam(':especialidade', $this->especialidade);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':data_nascimento', $this->data_nascimento);
			$stmt->bindParam(':sexo', $this->sexo);
			$stmt->bindParam(':evolu_obs', $this->evolu_obs);
			$stmt->bindParam(':medicamento', $this->medicamento);
			$stmt->bindParam(':prescricao', $this->prescricao);


			return $stmt->execute();
		}
		catch(Exception $e){

		}
	}


public function insert_paciente(){
		try{
			$sql = "INSERT INTO $this->table(cpf,nome,RG,orgao_emissor,data_emissao,logradouro,numero,CEP,cidade,cod_estado,data_nascimento,sexo) VALUES 
			(:cpf,:nome,:RG,:orgao_emissor,:data_emissao,:logradouro,:numero,:CEP,:cidade,:cod_estado,:data_nascimento,:sexo)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':RG', $this->RG);
			$stmt->bindParam(':orgao_emissor', $this->orgao_emissor);
			$stmt->bindParam(':data_emissao', $this->data_emissao);
			$stmt->bindParam(':logradouro', $this->logradouro);
			$stmt->bindParam(':numero', $this->numero);
			$stmt->bindParam(':CEP', $this->CEP);
			$stmt->bindParam(':cidade', $this->cidade);
			$stmt->bindParam(':cod_estado', $this->cod_estado);
			$stmt->bindParam(':data_nascimento', $this->data_nascimento);
			$stmt->bindParam(':sexo', $this->sexo);

			return $stmt->execute();
		}
		catch(Exception $e){

		}
	}
	public function update_paciente(){
		try{
			$sql = "UPDATE $this->table SET  cpf = :cpf, nome = :nome,RG = :RG, orgao_emissor = :orgao_emissor, data_emissao = :data_emissao, logradouro = :logradouro, numero = :numero, CEP = :CEP, cidade = :cidade, cod_estado = :cod_estado, data_nascimento = :data_nascimento, sexo = :sexo  
			WHERE cpf = :cpf";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':RG', $this->RG);
			$stmt->bindParam(':orgao_emissor', $this->orgao_emissor);
			$stmt->bindParam(':data_emissao', $this->data_emissao);
			$stmt->bindParam(':logradouro', $this->logradouro);
			$stmt->bindParam(':numero', $this->numero);
			$stmt->bindParam(':CEP', $this->CEP);
			$stmt->bindParam(':cidade', $this->cidade);
			$stmt->bindParam(':cod_estado', $this->cod_estado);
			$stmt->bindParam(':data_nascimento', $this->data_nascimento);
			$stmt->bindParam(':sexo', $this->sexo);

			return $stmt->execute();
		}
		catch(Exception $e){

		}
	}






public function insert_funcionario(){
		try{
			$sql = "INSERT INTO $this->table2(nome,cod_funcionario,cpf,email,usuario,senha) VALUES (:nome,:cod_funcionario,:cpf,:email,:usuario,:senha)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':cod_funcionario', $this->cod_funcionario);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':usuario', $this->usuario);
			$stmt->bindParam(':senha', $this->senha);
			

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function update_funcionario(){
		try{
			$sql = "UPDATE $this->table2 SET  nome = :nome, cod_funcionario = :cod_funcionario, cpf = :cpf, email =:email, usuario = :usuario, senha = :senha WHERE cod_funcionario = :cod_funcionario";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':nome', $this->nome);
			$stmt->bindParam(':cod_funcionario', $this->cod_funcionario);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':email', $this->email);
			$stmt->bindParam(':usuario', $this->usuario);
			$stmt->bindParam(':senha', $this->senha);
			

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

public function insert_telefone_Funcionario(){
		try{
			$sql = "INSERT INTO $this->table4(cod_funcionario,telefone,celular1,celular2) VALUES (:cod_funcionario,:telefone,:celular1,:celular2)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cod_funcionario', $this->cod_funcionario);
			$stmt->bindParam(':telefone', $this->telefone);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function update_telefone_Funcionario(){
		try{
			$sql = "UPDATE $this->table4 SET  cod_funcionario = :cod_funcionario, telefone = :telefone, celular1 = :celular1, celular2 = :celular2 WHERE cod_funcionario = :cod_funcionario";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cod_funcionario', $this->cod_funcionario);
			$stmt->bindParam(':telefone', $this->telefone);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function insert_telefone_Paciente(){
		try{
			$sql = "INSERT INTO $this->table3(cpf,nro_telefone,celular1,celular2) VALUES (:cpf,:telefone,:celular1,:celular2)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':telefone', $this->telefone);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function update_telefone_Paciente(){
		try{
			$sql = "UPDATE $this->table3 SET  cpf = :cpf, nro_telefone = :telefone, celular1 = :celular1, celular2 = :celular2 WHERE cpf = :cpf";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':cpf', $this->cpf);
			$stmt->bindParam(':telefone', $this->telefone);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function insert_telefone_Medico(){
		try{
			$sql = "INSERT INTO $this->table8(CRM,tel_med,celular1,celular2) VALUES (:CRM,:tel_med,:celular1,:celular2)";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':tel_med', $this->tel_med);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}


public function update_telefone_Medico(){
		try{
			$sql = "UPDATE $this->table8 SET  CRM = :CRM, tel_med = :tel_med, celular1 = :celular1, celular2 = :celular2 WHERE CRM = :CRM";
			$stmt = conexao::prepare($sql);
			$stmt->bindParam(':CRM', $this->CRM);
			$stmt->bindParam(':tel_med', $this->tel_med);
			$stmt->bindParam(':celular1', $this->celular1);
			$stmt->bindParam(':celular2', $this->celular2);

			return $stmt->execute();
		}
		catch(Exception $e){
		}
	}

	public function buscaMedico($valorF,$buscaF){

		

		if($buscaF == 'CRM'){
		$consulta="SELECT * FROM $this->table7,$this->table8 where $this->table7.CRM = $this->table8.CRM AND $this->table7.CRM = :valorF";

		$stmt = conexao::prepare($consulta);

		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}
		if(!empty($usuario)){
			$stmt->bindParam(':usuario', $usuario);
		}

		$stmt->execute();
		return $stmt->fetchAll();
		}


		if($buscaF == "Nome"){
		$consulta="SELECT * FROM $this->table7,$this->table8 where $this->table7.CRM = $this->table8.CRM AND $this->table7.nome LIKE :valorF ";
		
		$valorF = "%$valorF%";

		$stmt = conexao::prepare($consulta);
		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		if(!empty($CRM)){	
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}
		if(!empty($usuario)){
			$stmt->bindParam(':usuario', $usuario);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	

	}

}

public function buscaFuncionario($valorF,$buscaF){

		

		if($buscaF == 'Código'){
		$consulta="SELECT * FROM $this->table2,$this->table4 where $this->table2.cod_funcionario = $this->table4.cod_funcionario AND $this->table2.cod_funcionario = :valorF";

		$stmt = conexao::prepare($consulta);

		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($cod_funcionario)){
			$stmt->bindParam(':cod_funcionario', $cod_funcionario);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($email)){
			$stmt->bindParam(':email', $email);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
		}


		if($buscaF == "Nome"){
		$consulta="SELECT * FROM $this->table2,$this->table4 where $this->table2.cod_funcionario = $this->table4.cod_funcionario AND  $this->table2.nome LIKE :valorF ";
		
		$valorF = "%$valorF%";

		$stmt = conexao::prepare($consulta);
		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($cod_funcionario)){
			$stmt->bindParam(':cod_funcionario', $cod_funcionario);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($email)){
			$stmt->bindParam(':email', $email);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	

	}

}


public function buscaPaciente($valorF,$buscaF){

		

		if($buscaF == 'CPF'){
		$consulta="SELECT * FROM $this->table,$this->table3 where $this->table.cpf = $this->table3.cpf AND $this->table.cpf = :valorF";

		$stmt = conexao::prepare($consulta);

		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($endereco)){
			$stmt->bindParam(':endereco', $endereco);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
		}


		if($buscaF == "Nome"){
		$consulta="SELECT * FROM $this->table,$this->table3 where $this->table.cpf = $this->table3.cpf AND $this->table.nome LIKE :valorF ";
		
		$valorF = "%$valorF%";

		$stmt = conexao::prepare($consulta);
		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($endereco)){
			$stmt->bindParam(':logradouro', $logradouro);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	

	}

}

public function buscaConsulta($valorF,$buscaF){

		

		if($buscaF == 'CPF'){
		$consulta="SELECT * FROM $this->table6 where $this->table6.cpf = :valorF";

		$stmt = conexao::prepare($consulta);

		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($id)){
			$stmt->bindParam(':id', $id);
		}
		if(!empty($nome_med)){
			$stmt->bindParam(':nome_med', $nome_med);
		}
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($evolu_obs)){
			$stmt->bindParam(':evolu_obs', $evolu_obs);
		}
		if(!empty($medicamento)){
			$stmt->bindParam(':medicamento', $medicamento);
		}
		if(!empty($prescricao)){
			$stmt->bindParam(':prescricao', $prescricao);
		}

		$stmt->execute();
		return $stmt->fetchAll();
		}


		if($buscaF == "Nome"){
		$consulta="SELECT * FROM $this->table6 where $this->table6.nome LIKE :valorF ";
		
		$valorF = "%$valorF%";

		$stmt = conexao::prepare($consulta);
		if(!empty($valorF)){
			$stmt->bindParam(':valorF', $valorF);
		}
		
		if(!empty($id)){
			$stmt->bindParam(':id', $id);
		}
		if(!empty($nome_med)){
			$stmt->bindParam(':nome_med', $nome_med);
		}
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($evolu_obs)){
			$stmt->bindParam(':evolu_obs', $evolu_obs);
		}
		if(!empty($medicamento)){
			$stmt->bindParam(':medicamento', $medicamento);
		}
		if(!empty($prescricao)){
			$stmt->bindParam(':prescricao', $prescricao);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	

	}

}

public function deleteFuncionario($cod_funcionario){

		
		$sql = "DELETE FROM $this->table2 where cod_funcionario = :cod_funcionario";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':cod_funcionario', $cod_funcionario);
		$stmt->execute();
		return 0;
	}

	public function deletePaciente($cpf){

		
		$sql = "DELETE FROM $this->table where cpf = :cpf";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':cpf', $cpf);
		$stmt->execute();
		return 0;
	}

	public function deleteMedico($CRM){

		
		$sql = "DELETE FROM $this->table7 where CRM = :CRM";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':CRM', $CRM);
		$stmt->execute();
		return 0;
	}

	public function deleteConsulta($cpf){

		
		$sql = "DELETE FROM $this->table6 where cpf = :cpf";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':cpf', $cpf);
		$stmt->execute();
		return 0;
	}


	public function retornarClinico_consulta($cpf){
		
		$consulta="SELECT * FROM $this->table6 where $this->table6.cpf = :cpf";
		
		
		$stmt = conexao::prepare($consulta);		
		
		if(!empty($id)){
			$stmt->bindParam(':id', $id);
		}
		if(!empty($nome_med)){
			$stmt->bindParam(':nome_med', $nome_med);
		}
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($evolu_obs)){
			$stmt->bindParam(':evolu_obs', $evolu_obs);
		}
		if(!empty($medicamento)){
			$stmt->bindParam(':medicamento', $medicamento);
		}
		if(!empty($prescricao)){
			$stmt->bindParam(':prescricao', $prescricao);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function retornarClinico_paciente($cpf){
		
		$consulta="SELECT * FROM $this->table,$this->table3 where $this->table.cpf = $this->table3.cpf AND $this->table.cpf = :cpf";
		
		
		$stmt = conexao::prepare($consulta);		
		
		if(!empty($sexo)){
			$stmt->bindParam(':sexo', $sexo);
		}
		if(!empty($estado)){
			$stmt->bindParam(':cod_estado', $cod_estado);
		}
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($data_nascimento)){
			$stmt->bindParam(':data_nascimento', $data_nascimento);
		}
		if(!empty($endereco)){
			$stmt->bindParam(':endereco', $endereco);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function retornarClinico_funcionario($cod_funcionario){
		
		$consulta="SELECT * FROM $this->table2,$this->table4 where $this->table2.cod_funcionario = $this->table4.cod_funcionario AND $this->table2.cod_funcionario = :cod_funcionario";
		
		
		$stmt = conexao::prepare($consulta);		
		
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($cod_funcionario)){
			$stmt->bindParam(':cod_funcionario', $cod_funcionario);
		}
		if(!empty($email)){
			$stmt->bindParam(':email', $email);
		}
		if(!empty($usuario)){
			$stmt->bindParam(':usuario', $usuario);
		}
		if(!empty($senha)){
			$stmt->bindParam(':senha', $senha);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function retornarClinico_Medico_cpf($cpf){
		
		$consulta="SELECT * FROM $this->table7 where $this->table7.cpf= :cpf";
		
		
		$stmt = conexao::prepare($consulta);		
		
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}

	public function retornarClinico_Medico($CRM){
		
		$consulta="SELECT * FROM $this->table7,$this->table8 where $this->table7.CRM = $this->table8.CRM AND $this->table7.CRM= :CRM";
		
		
		$stmt = conexao::prepare($consulta);		
		
		if(!empty($nome)){
			$stmt->bindParam(':nome', $nome);
		}
		if(!empty($especialidade)){
			$stmt->bindParam(':especialidade', $especialidade);
		}
		if(!empty($cpf)){
			$stmt->bindParam(':cpf', $cpf);
		}
		if(!empty($CRM)){
			$stmt->bindParam(':CRM', $CRM);
		}
		if(!empty($email)){
			$stmt->bindParam(':email', $email);
		}
		if(!empty($usuario)){
			$stmt->bindParam(':usuario', $usuario);
		}
		if(!empty($senha)){
			$stmt->bindParam(':senha', $senha);
		}
		if(!empty($telefone)){
			$stmt->bindParam(':telefone', $telefone);
		}
		if(!empty($celular1)){
			$stmt->bindParam(':celular1', $celular1);
		}
		if(!empty($celular2)){
			$stmt->bindParam(':celular2', $celular2);
		}

		$stmt->execute();
		return $stmt->fetchAll();
	}


	public function nomeEstado($cod_estado){
		$sql = "SELECT nome FROM $this->table5 WHERE cod_estado = :cod_estado";
		$stmt = conexao::prepare($sql);
		$stmt->bindParam(':cod_estado', $cod_estado);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		foreach($result as $item){
			$nome = $item['nome'];
		}
		return $nome;
	}

	public function tipoEstado(){
		$sql = "SELECT * FROM $this->table5";
		$stmt = conexao::prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll();
	}

}