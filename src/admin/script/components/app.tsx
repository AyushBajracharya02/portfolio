import React from "react";
import { Card, CardContent, CardHeader, CardTitle } from "@/components/ui/card";
import {
   Form,
   FormControl,
   FormField,
   FormItem,
   FormLabel,
   FormMessage,
} from "@/components/ui/form";
import { Input } from "@/components/ui/input";
import { useForm } from "react-hook-form";
import { Button } from "@/components/ui/button";
import { zodResolver } from "@hookform/resolvers/zod";
import z from "zod";

const loginSchema = z.object({
   email: z.email(),
   password: z.string(),
});

type LoginSchema = z.infer<typeof loginSchema>;

export default function App() {
   const loginForm = useForm({
      resolver: zodResolver(loginSchema),
      defaultValues: {
         email: "",
         password: "",
      },
   });

   function handleLogin(values: LoginSchema) {
      console.log(values);
   }

   return (
      <section className="min-h-screen content-center">
         <div className="container">
            <Card className="max-w-lg mx-auto">
               <CardHeader>
                  <CardTitle className="text-center">Log In</CardTitle>
               </CardHeader>
               <CardContent>
                  <Form {...loginForm}>
                     <form onSubmit={loginForm.handleSubmit(handleLogin)}>
                        <FormField
                           name="email"
                           render={() => (
                              <FormItem>
                                 <FormLabel>Email</FormLabel>
                                 <FormControl>
                                    <Input />
                                 </FormControl>
                                 <FormMessage />
                              </FormItem>
                           )}
                        />
                        <div className="mt-4">
                           <FormField
                              name="password"
                              render={({ field }) => (
                                 <FormItem>
                                    <FormLabel>Password</FormLabel>
                                    <FormControl>
                                       <Input {...field} type="password" />
                                    </FormControl>
                                    <FormMessage />
                                 </FormItem>
                              )}
                           />
                        </div>
                        <div className="grid mt-4">
                           <Button>Submit</Button>
                        </div>
                     </form>
                  </Form>
               </CardContent>
            </Card>
         </div>
      </section>
   );
}
