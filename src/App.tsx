import React from 'react';
import { Header } from './components/layout/Header';
import { Footer } from './components/layout/Footer';

function App() {
  return (
    <div className="min-h-screen flex flex-col">
      <Header />
      
      <main className="flex-grow">
        {/* Content will be added in subsequent steps */}
        <div className="container mx-auto px-4 py-8">
          <h1 className="text-3xl font-bold text-center mb-8">
            Bem-vindo à Câmara Municipal de Pedro Afonso
          </h1>
        </div>
      </main>
      
      <Footer />
    </div>
  );
}

export default App;