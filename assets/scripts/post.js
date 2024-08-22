// Adiciona um listener para o evento de mudança no input de arquivo
document.getElementById('fileInput').addEventListener('change', function(event) {
  // Obtém o arquivo selecionado
  var file = event.target.files[0];

  // Verifica se um arquivo foi selecionado
  if (file) {
      // Cria um objeto URL para o arquivo
      var reader = new FileReader();

      // Define o que fazer quando o arquivo é lido
      reader.onload = function(e) {
          // Atualiza o src da imagem com o URL do arquivo
          document.getElementById('profileImage').src = e.target.result;
      };

      // Lê o arquivo como uma URL de dados
      reader.readAsDataURL(file);
  }
});
