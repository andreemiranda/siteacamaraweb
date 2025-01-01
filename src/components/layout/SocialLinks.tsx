import React from 'react';
import { Facebook, Instagram, Youtube } from 'lucide-react';

export function SocialLinks() {
  return (
    <div className="flex gap-4">
      <a href="#" className="hover:text-blue-300">
        <Facebook className="w-5 h-5" />
      </a>
      <a href="#" className="hover:text-blue-300">
        <Instagram className="w-5 h-5" />
      </a>
      <a href="#" className="hover:text-blue-300">
        <Youtube className="w-5 h-5" />
      </a>
    </div>
  );
}