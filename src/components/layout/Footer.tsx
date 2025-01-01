import React from 'react';

export function Footer() {
  return (
    <footer className="bg-blue-900 text-white py-12">
      <div className="container mx-auto px-4">
        <div className="grid grid-cols-4 gap-8">
          <div>
            <h3 className="text-xl font-bold mb-4">Sobre a Câmara</h3>
            <p className="text-gray-300">
              A Câmara Municipal de Pedro Afonso é a casa legislativa do município,
              responsável pela elaboração das leis e fiscalização do Executivo.
            </p>
          </div>
          
          <div>
            <h3 className="text-xl font-bold mb-4">Links Rápidos</h3>
            <ul className="space-y-2">
              <li><a href="/transparencia" className="hover:text-blue-300">Portal da Transparência</a></li>
              <li><a href="/leis" className="hover:text-blue-300">Legislação</a></li>
              <li><a href="/sessoes" className="hover:text-blue-300">Sessões</a></li>
            </ul>
          </div>
          
          <div>
            <h3 className="text-xl font-bold mb-4">Contato</h3>
            <ul className="space-y-2 text-gray-300">
              <li>Endereço: Rua Principal, 123</li>
              <li>Telefone: (63) 3466-0000</li>
              <li>Email: contato@camarapedroafonso.to.gov.br</li>
            </ul>
          </div>
          
          <div>
            <h3 className="text-xl font-bold mb-4">Horário de Funcionamento</h3>
            <p className="text-gray-300">
              Segunda a Sexta<br />
              08:00 - 12:00<br />
              14:00 - 18:00
            </p>
          </div>
        </div>
        
        <div className="mt-8 pt-8 border-t border-blue-800 text-center text-gray-300">
          <p>© 2024 Câmara Municipal de Pedro Afonso. Todos os direitos reservados.</p>
          <p className="mt-2">Desenvolvido por Carlos Andre Rocha Miranda</p>
        </div>
      </div>
    </footer>
  );
}