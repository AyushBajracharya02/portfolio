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
import axios, { AxiosError } from "axios";
import { PasswordInput } from "./password-input";

const loginSchema = z.object({
   email: z.email(),
   password: z.string(),
});

type LoginSchema = z.infer<typeof loginSchema>;

export default function Login() {
   const loginForm = useForm({
      resolver: zodResolver(loginSchema),
      defaultValues: {
         email: "",
         password: "",
      },
   });

   async function handleLogin(values: LoginSchema) {
      try {
         const {
            data: { redirect },
         } = await axios.post("/api/admin/login", values);
         console.log(redirect);
         window.location.href = redirect;
      } catch (error) {
         if (error instanceof AxiosError) {
            if (error.status === 401) {
               const {
                  response: {
                     data: { error: message },
                  },
               } = error;
               loginForm.setError("email", { message });
               loginForm.setError("password", { message });
            }
         }
      }
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
                           render={({ field }) => (
                              <FormItem>
                                 <FormLabel>Email</FormLabel>
                                 <FormControl>
                                    <Input {...field} type="email" />
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
                                    <div className="flex justify-between">
                                       <FormLabel>Password</FormLabel>
                                       <Button asChild variant="link" size="sm">
                                          <a href="/admin/forgot-password">
                                             Forgot Password?
                                          </a>
                                       </Button>
                                    </div>
                                    <FormControl>
                                       <PasswordInput {...field} />
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
