Breakpoint 1 at 0x1151: file example.c, line 4.
[Thread debugging using libthread_db enabled]
Using host libthread_db library "/lib/x86_64-linux-gnu/libthread_db.so.1".

Breakpoint 1, main () at example.c:4
4	printf("hello");
rax            0x555555555149      93824992235849
rbx            0x0                 0
rcx            0x555555557dc0      93824992247232
rdx            0x7fffffffdd38      140737488346424
rsi            0x7fffffffdd28      140737488346408
rdi            0x1                 1
rbp            0x7fffffffdc10      0x7fffffffdc10
rsp            0x7fffffffdc10      0x7fffffffdc10
r8             0x7ffff7e1af10      140737352150800
r9             0x7ffff7fc9040      140737353912384
r10            0x7ffff7fc3908      140737353890056
r11            0x7ffff7fde680      140737354000000
r12            0x7fffffffdd28      140737488346408
r13            0x555555555149      93824992235849
r14            0x555555557dc0      93824992247232
r15            0x7ffff7ffd040      140737354125376
rip            0x555555555151      0x555555555151 <main+8>
eflags         0x246               [ PF ZF IF ]
cs             0x33                51
ss             0x2b                43
ds             0x0                 0
es             0x0                 0
fs             0x0                 0
gs             0x0                 0
k0             0x2000000           33554432
k1             0x20008             131080
k2             0x0                 0
k3             0x0                 0
k4             0x0                 0
k5             0x0                 0
k6             0x0                 0
k7             0x0                 0
=> 0x555555555151 <main+8>:	lea    0xeac(%rip),%rax        # 0x555555556004
   0x555555555158 <main+15>:	mov    %rax,%rdi
   0x55555555515b <main+18>:	mov    $0x0,%eax
   0x555555555160 <main+23>:	call   0x555555555050 <printf@plt>
   0x555555555165 <main+28>:	mov    $0x0,%eax
   0x55555555516a <main+33>:	pop    %rbp
   0x55555555516b <main+34>:	ret    
   0x55555555516c <_fini>:	endbr64 
   0x555555555170 <_fini+4>:	sub    $0x8,%rsp
   0x555555555174 <_fini+8>:	add    $0x8,%rsp
A debugging session is active.

	Inferior 1 [process 14104] will be killed.

Quit anyway? (y or n) [answered Y; input not from terminal]
