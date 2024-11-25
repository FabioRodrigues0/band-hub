export interface Artist {
    id: number;
    name: string;
    image?: string;
    slug: string;
}

export interface Album {
    id: number;
    name: string;
    image?: string;
    slug: string;
    artists: Artist[];
}
