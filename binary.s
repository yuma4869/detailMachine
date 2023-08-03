Breakpoint 1 at 0x1195: file example.c, line 3.
[Thread debugging using libthread_db enabled]
Using host libthread_db library "/lib/x86_64-linux-gnu/libthread_db.so.1".

Breakpoint 1, main () at example.c:3
3	int main() {  int variable; scanf("%d", &variable); printf("%d",variable); }
rax            0x555555555189      93824992235913
rbx            0x0                 0
rcx            0x555555557db0      93824992247216
rdx            0x7fffffffdd38      140737488346424
rsi            0x7fffffffdd28      140737488346408
rdi            0x1                 1
rbp            0x7fffffffdc10      0x7fffffffdc10
rsp            0x7fffffffdc00      0x7fffffffdc00
r8             0x7ffff7e1af10      140737352150800
r9             0x7ffff7fc9040      140737353912384
r10            0x7ffff7fc3908      140737353890056
r11            0x7ffff7fde680      140737354000000
r12            0x7fffffffdd28      140737488346408
r13            0x555555555189      93824992235913
r14            0x555555557db0      93824992247216
r15            0x7ffff7ffd040      140737354125376
rip            0x555555555195      0x555555555195 <main+12>
eflags         0x206               [ PF IF ]
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
=> 0x555555555195 <main+12>:	mov    %fs:0x28,%rax
   0x55555555519e <main+21>:	mov    %rax,-0x8(%rbp)
   0x5555555551a2 <main+25>:	xor    %eax,%eax
   0x5555555551a4 <main+27>:	lea    -0xc(%rbp),%rax
   0x5555555551a8 <main+31>:	mov    %rax,%rsi
   0x5555555551ab <main+34>:	lea    0xe52(%rip),%rax        # 0x555555556004
   0x5555555551b2 <main+41>:	mov    %rax,%rdi
   0x5555555551b5 <main+44>:	mov    $0x0,%eax
   0x5555555551ba <main+49>:	call   0x555555555090 <__isoc99_scanf@plt>
   0x5555555551bf <main+54>:	mov    -0xc(%rbp),%eax
A debugging session is active.

	Inferior 1 [process 7672] will be killed.

Quit anyway? (y or n) [answered Y; input not from terminal]
