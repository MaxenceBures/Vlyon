< ? p h p 
 c l a s s   c l s t B a s e M y s q l 
 { 
 	 	 	 p r i v a t e   $ i d ; 	 	 / /   i d e n t i f i a n t   d e   l a   c o n n e x i o n 
 	 	 	 p r i v a t e   $ S e r v e u r   ;     / /   n o m   d e   l ' h � t e 
 	 	 	 p r i v a t e   $ B d d ;       	 / /   L e   n o m   d e   l a   b a s e   d e   d o n n � e s 
 	 	 	 p r i v a t e   $ U s e r ;         	 / /   L e   n o m   d ' u t i l i s a t e u r 
 	 	 	 p r i v a t e   $ M d p ; 	 	 / /   L e   m o t   d e   p a s s e 
 
 	   / /   C o n s t r u c t e u r   d e   l a   c l a s s e 
 	 	 	 p u b l i c   f u n c t i o n   _ _ c o n s t r u c t ( $ p S e r v e u r , $ p U s e r , $ p M d p , $ p B d d ) 
 	 { 
 	 	 	 	 $ t h i s - > S e r v e u r   =   $ p S e r v e u r ; 
 	 	 	 	 $ t h i s - > B d d           =   $ p B d d ; 
 	 	 	 	 $ t h i s - > U s e r         =   $ p U s e r ; 
 	 	 	 	 $ t h i s - > M d p           =   $ p M d p ; 
 	 	 	 	 $ t h i s - > i d   	       =   $ t h i s - > c o n n e c t ( $ p S e r v e u r ,   $ p U s e r ,   $ p M d p ) ; 
 	 	 	 	 $ t h i s - > s e l e c t B d d ( $ p B d d ) ; 
 	 	 	 } 
 
 	 	 	 / /   s e   c o n n e c t e r   �   l a   b a s e   d e   d o n n � e s   M y S Q L 
 	 	 	 p r i v a t e   f u n c t i o n   c o n n e c t ( $ p S e r v e u r ,   $ p U s e r ,   $ p M d p ) 
 	 { 
 	 	 	 	 $ r e s   =   m y s q l _ c o n n e c t ( $ p S e r v e u r ,   $ p U s e r ,   $ p M d p )   o r   d i e ( " E r r e u r   d e   c o n n e x i o n   �   M y S q l " ) ; 
 	 	 	 	 / /   d i e   ( ' o n   e s t   d a n s   b d d ' ) ; 
 	 	 	 	 r e t u r n   ( $ r e s )   ; 
 	 	 	 } 
 
 	 / /   s � l e c t i o n n e r   u n e   b a s e 
 	 	 	 p r i v a t e   f u n c t i o n   s e l e c t B d d ( $ p B d d ) 
 	 { 
 	 	 	 	 m y s q l _ s e l e c t _ d b ( $ p B d d )   o r   d i e ( " e r r e u r   s u r   l a   b a s e   d e   d o n n � e s " )   ; 
 	 	 	 } 
 
 	 / /   E n v o y e r   l a   r e q u � t e   d e   t y p e   S E L E C T 
 	 p u b l i c   f u n c t i o n   q u e r y ( $ p R e q ) 
 	 { 
 	 	 	 	 	 $ r e s   =     m y s q l _ q u e r y ( $ p R e q )   o r   d i e ( " e r r e u r   a v e c   l a   r e q u � t e   " .   $ p R e q ) ; 
 	 	 	 	 r e t u r n   ( $ r e s )   ; 
 	 	 	 } 
 
 	 / /   L i r e   l e   r � s u l t a t   d e   l a   r e q u � t e   d e   t y p e   S E L E C T   e t   r e t o u r n e r   u n   t a b l e a u   ( c u r s e u r ) 
 	 	 	 p u b l i c   f u n c t i o n   t a b R e s u l t ( $ p R e q ) 
 	 { 
 	 	 	 	 	 $ t a b R e s   =   m y s q l _ f e t c h _ a r r a y ( $ p R e q ) ; 
 	 	 	 	 	 r e t u r n   ( $ t a b R e s )   ; 
 	 	 } 
 
 	 / /   E x � c u t e r   l a   r e q u � t e   e t   r e t o u r n e r   l a   v a l e u r   o b t e n u e   p a r   c o u n t ,   s u m ,   a v g ,   m a x ,   m i n   ( s i   u n   s e u l   c h a m p ) 
 	 f u n c t i o n   g e t N o m b r e ( $ p R e q ) 
 	 { 
 	 	 $ r e s   =   m y s q l _ q u e r y ( $ p R e q )   o r   d i e ( " e r r e u r   a v e c   l a   r e q u � t e   " .   $ p R e q ) ; 
 	 	 $ c h a m p   =   m y s q l _ r e s u l t ( $ r e s ,   0 ) ; 
 	 	 r e t u r n   ( $ c h a m p ) ; 
 	 } 
 
 	 / /   R e t o u r n e r   l e   d e r n i e r   i d e n t i f i a n t   g � n � r �   p a r   u n   c h a m p   d e   t y p e   A U T O _ I N C R E M E N T 
 	 p u b l i c   f u n c t i o n   d e r n i e r I d ( ) 
 	 { 
 	 	 	 	 $ r e s   =   m y s q l _ q u e r y ( $ p R e q )   o r   d i e ( " e r r e u r   a v e c   l a   r e q u � t e   " ) ; 
 	 	 	 	 r e t u r n   ( m y s q l _ i n s e r t _ i d ( ) ) ; 
 	 	 	 } 
 
 	 / /   L i r e   l e   r � s u l t a t   d e   l a   r e q u � t e   d e   t y p e   S E L E C T   e t   r e t o u r n e r   u n   t a b l e a u   a s o c i a t i f 
 	 	 	 p u b l i c   f u n c t i o n   t a b A s s o c ( $ p R e q ) 
 	 { 
 	 	 	 	 	 $ T a b R e s   =   m y s q l _ f e t c h _ a s s o c ( $ p R e q ) ; 
 	 	 	 r e t u r n   ( $ T a b R e s )   ; 
 	 	 } 
 
 	 / /   R e t o u r n e r   l e   n o m b r e   d e   l i g n e s   a f f e c t � e s   p a r   l a   d e r n i � r e   o p � r a t i o n   S Q L . 
 	 	 p u b l i c   f u n c t i o n   g e t N b L i g n e s ( $ p R e q ) 
 	 { 
 	 	 	 	 	 r e t u r n   ( m y s q l _ n u m _ r o w s ( $ p R e q ) )   ; 
 	 	 } 
 
 	 	 / /   E x � c u t e r   l a   r e q u � t e   d e   t y p e   I N S E R T ,   U P D A T E   , D E L E T E 
 	 p u b l i c   f u n c t i o n   e x e c u t e ( $ p R e q ) 
 	 { 
 	 	 	 	 	 $ r e s   =     m y s q l _ q u e r y ( $ p R e q )   o r   d i e ( " e r r e u r   a v e c   l a   r e q u � t e   d e   m o d i f i c a t i o n   d e   d o n n � e s   "   . $ p R e q ) ; 
 	 	 	 	 r e t u r n   ( $ r e s )   ; 
 	 	 	 } 
 
 	 	 	 / /   D e s t r u c t e u r   d e   l a   c l a s s e   C o n n e x i o n 
 	 	 p u b l i c   f u n c t i o n   _ _ d e s t r u c t ( ) 
 	 { 
 	 	 / / m y s q l _ c l o s e ( $ t h i s - > i d ) ; 
 	 } 
 } 
 