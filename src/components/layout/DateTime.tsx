import React, { useState, useEffect } from 'react';
import { Clock } from 'lucide-react';

export function DateTime() {
  const [date, setDate] = useState(new Date());

  useEffect(() => {
    const timer = setInterval(() => setDate(new Date()), 1000);
    return () => clearInterval(timer);
  }, []);

  return (
    <div className="flex items-center gap-2">
      <Clock className="w-4 h-4" />
      <span>
        {date.toLocaleDateString('pt-BR')} - {date.toLocaleTimeString('pt-BR')}
      </span>
    </div>
  );
}