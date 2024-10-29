function fetchProducts(){
    fetch('list_products.php').then(Response => Response.json()) // Converte a resposta para json
    .then(data => {

    const productList = document.getElementById('productList');
    productList.innerHTML = ''; // Limpa a lista

    // Loop por cada produto a adicionar ao DOM
    data.forEach(product =>{
        const div = document.createElement('div');
        div.innerHTML = `

            <h3>${product.name}</h3>
            <p>Preço: ${product.price}</p>
            <p>${product.description}</p>
            <button onClick="deleteProduct(${product.id})">Excluir</button>
            <button onClick="editProduct($product.id), ''$(product.name)', $(product.price), '$(product.description)')"></button>

            `;
            
            productList.appendChild(div);

    });
    });
}

function deleteProduct(id){
    if (confirm('Tem certeza que deseja excluir este produto')){
    fetch(`delete_product.php?id=${id})`, {method: 'GET' })
    .then(() => fetchProducts()); //Atualiza a Lista de produtos
    }
}

//Função para editar produto

function editProduct(id,name,price,description){
    document.getElementById('name').value = name;
    document.getElementById('price').value = price;
    document.getElementById('description').value = description;

    const form = document.getElementById('productForm');
    form.action = 'edit_product.php?id=$(id)'; //Muda o destino do formulário
}