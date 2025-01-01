export interface Legislator {
  id: string;
  name: string;
  image: string;
  role: string;
  biography: string;
}

export interface Document {
  id: string;
  title: string;
  date: string;
  type: 'law' | 'resolution' | 'ordinance' | 'minutes' | 'bill';
  legislatorId?: string;
  content: string;
  fileUrl?: string;
}

export interface AgendaItem {
  id: string;
  title: string;
  date: string;
  description: string;
  status: 'pending' | 'in_progress' | 'completed';
}