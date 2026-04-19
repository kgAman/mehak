import React from 'react';
import { createRoot } from 'react-dom/client';

// Make sure this path exactly matches where you saved your component!
import InfiniteMenu from './component/InfiniteMenu'; 

// Your project data
const galleryItems = [
  {
    image: 'https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=1000&auto=format&fit=crop',
    link: '#',
    title: 'Structural Framing',
    description: 'Heavy timber construction in Richmond.'
  },
  {
    image: 'https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=1000&auto=format&fit=crop',
    link: '#',
    title: 'Custom Cabinetry',
    description: 'Precision woodwork in South Yarra.'
  },
  {
    image: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=1000&auto=format&fit=crop',
    link: '#',
    title: 'Decking Restoration',
    description: 'Weatherproofed timber in St Kilda.'
  },
  {
    image: 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1000&auto=format&fit=crop',
    link: '#',
    title: 'Heritage Renovation',
    description: 'Restored Victorian facade in Carlton.'
  },
  {
    image: 'https://images.unsplash.com/photo-1541888081631-f18c8f000b21?q=80&w=1000&auto=format&fit=crop',
    link: '#',
    title: 'Commercial Fitout',
    description: 'Modern office space in the CBD.'
  }
];

const GalleryApp = () => {
  return (
    // Adjust height here to fit perfectly within your heavy metal frame
    <div style={{ height: '700px', width: '100%', position: 'relative' }}>
      <InfiniteMenu items={galleryItems} scale={1.2} />
    </div>
  );
};

// This looks for the empty div in your Blade file and injects the 3D menu into it
const rootElement = document.getElementById('react-gallery-root');
if (rootElement) {
  const root = createRoot(rootElement);
  root.render(<GalleryApp />);
}