import React from 'react';
import { Clock } from 'lucide-react';
import { SocialLinks } from './SocialLinks';
import { DateTime } from './DateTime';

export function Header() {
  return (
    <>
      <div className="bg-blue-900 text-white py-2">
        <div className="container mx-auto px-4 flex justify-between items-center">
          <DateTime />
          <SocialLinks />
        </div>
      </div>
      
      <header className="bg-white shadow-md">
        <div className="container mx-auto px-4 py-4">
          <div className="flex items-center justify-between">
            <div className="flex items-center gap-4">
              <img 
                src="/logo.png" 
                alt="Câmara Municipal de Pedro Afonso" 
                className="w-[90px] h-[90px] object-contain"
              />
              <div>
                <h1 className="text-2xl font-bold text-blue-900">
                  Câmara Municipal de Pedro Afonso
                </h1>
                <p className="text-gray-600">
                  Poder Legislativo Municipal
                </p>
              </div>
            </div>
            
            <nav>
              <ul className="flex gap-6">
                <li><a href="/" className="hover:text-blue-600">Início</a></li>
                <li><a href="/parlamentares" className="hover:text-blue-600">Parlamentares</a></li>
                <li><a href="/transparencia" className="hover:text-blue-600">Transparência</a></li>
                <li><a href="/documentos" className="hover:text-blue-600">Documentos</a></li>
                <li><a href="/noticias" className="hover:text-blue-600">Notícias</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </header>
    </>
  );
}